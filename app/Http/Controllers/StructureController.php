<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreStructureRequest;
use App\Http\Requests\UpdateStructureRequest;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.structure.index', [
            'structures' => Structure::all(),
            'my_actions' => $this->structure_actions(),
            'my_attributes' => $this->structure_columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.structure.create', [
            'my_fields' => $this->structure_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStructureRequest $request)
    {
        $structure = new Structure();

        $fileName = time() . '.' . $request->logo->extension();
        // $path = $request->file('logo')->storeAs('logos', $fileName, 'public');

        $request->logo->move(public_path('storage'), $fileName);
        $path = $fileName;

        $structure->name = $request->name;
        $structure->contact = $request->contact;
        $structure->email = $request->email;
        $structure->address = $request->address;
        $structure->slug = $request->slug;
        $structure->type = $request->type;
        $structure->logo = $path;

        if ($structure->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('structure');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Structure $structure)
    {
        return view('app.structure.edit', [
            'structure' => $structure,
            'my_fields' => $this->structure_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStructureRequest $request, Structure $structure)
    {
        $structure = Structure::find($structure->id);

        if ($request->logo !== null) {
            $fileName = time() . '.' . $request->logo->extension();
            // $path = $request->file('logo')->storeAs('logos', $fileName, 'public');
            $request->logo->move(public_path('storage'), $fileName);
            $path = $fileName;
        }

        $structure->name = $request->name;
        $structure->contact = $request->contact;
        $structure->email = $request->email;
        $structure->address = $request->address;
        $structure->slug = $request->slug;
        $structure->type = $request->type;
        $structure->created_at = $request->created_at;
        if (isset($path)) {
            $structure->logo = $path;
        }

        if ($structure->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('structure');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Structure $structure)
    {
        try {
            $structure = $structure->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('structure');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function structure_columns()
    {
        $columns = (object) array(
            'logo' => '',
            'type' => 'Catégorie',
            'name' => 'Nom',
            'email' => "Email",
            'contact' => "Contact",
            'address' => "Adresse",
            "formated_date" => "Date de Creation",
            // 'slug' => "Lien",
        );
        return $columns;
    }

    private function structure_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function structure_fields()
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
            'name' => [
                'title' => 'Dénomination',
                'field' => 'text'
            ],
            'contact' => [
                'title' => 'Contact',
                'field' => 'tel'
            ],
            'email' => [
                'title' => 'Email',
                'field' => 'email'
            ],
            'address' => [
                'title' => 'Adresse',
                'field' => 'text'
            ],
            'slug' => [
                'title' => 'Lien',
                'field' => 'url'
            ],
            'logo' => [
                'title' => 'Logo',
                'field' => 'file'
            ],
        ];

        if (Route::currentRouteName() == 'structure.edit') {
            $fields['created_at'] = [
                'title' => 'Date de début',
                'field' => 'date'
            ];
        }

        return $fields;
        
    }
}
