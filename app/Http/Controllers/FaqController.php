<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.faq.index', [
            'faqs' => Faq::all(),
            'my_actions' => $this->faq_actions(),
            'my_attributes' => $this->faq_columns(),
        ]);
    }
    public function structure()
    {
        return view('app.faq.structure', [
            'faqs' => Faq::where('type', Auth::user()->structure->type)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.faq.create', [
            'my_fields' => $this->faq_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request)
    {
        $faq = new Faq();

        $faq->quiz = $request->quiz;
        $faq->answer = $request->answer;
        $faq->type = $request->type;
      
        if ($faq->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('faq');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }

        

    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('app.faq.edit', [
            'faq' => $faq,
            'my_fields' => $this->faq_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq = Faq::find($faq->id);
        $faq->quiz = $request->quiz;
        $faq->answer = $request->slug;
        $faq->type = $request->type;

        if ($faq->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('faq');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        try {
            $faq = $faq->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('faq');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function faq_columns()
    {
        $columns = (object) array(
           
            'type' => 'Catégorie',
            'quiz' => 'Question',
            'answer' => "Réponse",
            
        );
        return $columns;
    }

    private function faq_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function faq_fields()
    {
        $fields = [
            'type' => [
                'title' => 'Categorie',
                'field' => 'select',
                'options' => [
                    'Hotel' => 'Hotel',
                    'Pharmacie' => 'Pharmacie',
                    'Pharmacie Agréée' => 'Pharmacie Agréée',
                    'Supermarché' => 'Supermarche'
                ]
            ],
            'quiz' => [
                'title' => 'Question',
                'field' => 'text'
            ],
            'answer' => [
                'title' => 'Réponse',
                'field' => 'textarea'
            ],
           
        ];

        // if (Route::currentRouteName() == 'faq.edit') {
        //     $fields['created_at'] = [
        //         'title' => 'Date de début',
        //         'field' => 'date'
        //     ];
        // }

        return $fields;
    }

}
