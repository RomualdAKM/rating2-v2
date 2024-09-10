<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        foreach (auth()->user()->notifications as $notification) {
            $notification->markAsRead();
        }
        $structure = Auth::user()->structure;
        return view('app.complain.index', [
            'complains' => $structure->complains()->orderBy('created_at', 'desc')->get(),
            'my_actions' => $this->complain_actions(),
            'my_attributes' => $this->complain_columns(),
        ]);
    }

    /**
     * Display the specified resource.
     */

    public function show(Complain $complain)
    {
        return view('app.complain.show', [
            'complain' => $complain,
            'my_fields' => $this->complain_fields(),
        ]);
    }

    public function edit(Complain $complain)
    {
        return view('app.complain.edit', [
            'complain' => $complain,
            'my_fields' => $this->complain_fields(),
        ]);
    }

    public function update(Request $request, Complain $complain)
    {
        $complain->status = $request->status;

        if ($complain->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('complain');
        };
    }

    private function complain_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'contact' => "Contact",
            'complain' => "Plainte",
            'status' => "Statut",
            'formatted_date' => 'Date'
           
        );
        return $columns;
    }

    private function complain_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
        );
        return $actions;
    }

    private function complain_fields()
    {
        if (Route::currentRouteName() == 'complain.show') {    
            $fields = [
                'name' => [
                    'title' => 'Nom et prénoms',
                    'field' => 'text'
                ],
                'contact' => [
                    'title' => 'Contact',
                    'field' => 'tel'
                ],
                'complain' => [
                    'title' => 'Plainte',
                    'field' => 'textarea',
                    'colspan' => 'true'
                ],
            ];

        }
        if (Route::currentRouteName() == 'complain.edit') {    
            $fields = [
                'status' => [
                    'title' => 'Statut',
                    'field' => 'select',
                    'options' => [
                        'En cours de traitement' => 'En cours de traitement',
                        'Plainte traitée, client satisfait' => 'Plainte traitée, client satisfait', 
                        'Plainte traitée, client non satisfait' => 'Plainte traitée, client non satisfait',
                    ]
                ],
            ];
        }

        return $fields;
    }
}
