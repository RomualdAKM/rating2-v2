<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Services\KairosService;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;

class StaffController extends Controller
{

    protected $kairosService;

    public function __construct(KairosService $kairosService)
    {
        $this->kairosService = $kairosService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.staff.index', [
            'staffs' => $structure->staffs()->get(),
            'my_actions' => $this->staff_actions(),
            'my_attributes' => $this->staff_columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.staff.create', [
            'my_fields' => $this->staff_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        $staff = new Staff();
        $filePhotoName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('storage'), $filePhotoName);
    
        $fileDiplomaName = time() . '.' . $request->diploma->extension();
        $request->diploma->move(public_path('storage'), $fileDiplomaName);
    
        $staff->name = $request->name;
        $staff->first_name = $request->first_name;
        $staff->contact = $request->contact;
        $staff->email = $request->email;
        $staff->date_ofentry_into_service = $request->date_ofentry_into_service;
        $staff->start_time = $request->start_time;
        $staff->end_time = $request->end_time;
        $staff->matriculation = Staff::generateUniqueMatricule();
        $staff->structure_id = Auth::user()->structure_id;
        $staff->photo = $filePhotoName;
        $staff->diploma = $fileDiplomaName;
    
        if ($staff->save()) {
            // Convertir l'image en base64
            $imagePath = public_path('storage/' . $filePhotoName);
            $imageData = base64_encode(file_get_contents($imagePath));
    
            // Appel à l'API Kairos pour enregistrer le visage
            $kairosResponse = app(KairosService::class)->enroll($imageData, $staff->matriculation, 'employees_gallery');
    
            // Log the response from Kairos
            \Log::info('Kairos enroll response', (array)$kairosResponse);
    
            if (isset($kairosResponse['Errors'])) {
                Alert::toast('Erreur lors de l\'enregistrement du visage dans Kairos.', 'error');
            } else {
                Alert::toast("Données enregistrées et visage ajouté à la galerie Kairos.", 'success');
            }
    
            return redirect('staff');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('app.staff.edit', [
            'staff' => $staff,
            'my_fields' => $this->staff_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        $staff = Staff::find($staff->id);
        $filePhotoName = time() . '.' . $request->photo->extension();
        // $path = $request->file('logo')->storeAs('logos', $fileName, 'public');
        $request->photo->move(public_path('storage'), $filePhotoName);
        $pathPhoto = $filePhotoName;

        $fileDiplomaName = time() . '.' . $request->diploma->extension();
        // $path = $request->file('logo')->storeAs('logos', $fileName, 'public');
        $request->diploma->move(public_path('storage'), $fileDiplomaName);
        $pathDiploma = $fileDiplomaName;

        $staff->name = $request->name;
        $staff->first_name = $request->first_name;
        $staff->contact = $request->contact;
        $staff->email = $request->email;
        $staff->date_ofentry_into_service = $request->date_ofentry_into_service;
        $staff->start_time = $request->start_time;
        $staff->end_time = $request->end_time;
        $staff->matriculation = Staff::generateUniqueMatricule();
        $staff->staff_id = Auth::user()->structure_id;
        $staff->photo = $pathPhoto;
        $staff->diploma = $pathDiploma;

        if ($staff->save()) {
            Alert::toast("Les informations ont été modifiées", 'success');
            return redirect('staff');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        try {
            $staff = $staff->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('staff');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function staff_columns()
    {

        $columns = (object) array(
            'matriculation' => 'Matricule',
            'photo' => 'Photo',
            //'diploma' => 'Diplôme',
            'name' => 'Nom',
            'first_name' => 'Prénoms',
            'email' => "Email",
            'contact' => "Contact",
            'start_time' => "Heure du debut du travail",
            'end_time' => "Heure de la fin du travail",
            "date_ofentry_into_service" => "Date de prise de service",
            "formated_date" => "Date de Creation",
            // 'slug' => "Lien",
        );
        return $columns;
    }

    private function staff_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function staff_fields()
    {
        $fields = [
            // 'type' => [
            //     'title' => 'Categorie',
            //     'field' => 'select',
            //     'options' => [
            //         'Hotel' => 'Hotel',
            //         'Pharmacie' => 'Pharmacie',
            //         'Pharmacie Agréée' => 'Pharmacie Agréée',
            //         'Supermarché' => 'Supermarche'
            //     ]
            // ],
            'name' => [
                'title' => 'Nom',
                'field' => 'text'
            ],
            'first_name' => [
                'title' => 'Prénoms',
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
            'date_ofentry_into_service' => [
                'title' => 'Date de prise de service',
                'field' => 'date'
            ],

            'start_time' => [
                'title' => 'Heure du début du travail',
                'field' => 'time'
            ],

            'end_time' => [
                'title' => 'Heure de fin du travail',
                'field' => 'time'
            ],

            'slug' => [
                'title' => 'Lien',
                'field' => 'url'
            ],

            'photo' => [
                'title' => 'Photo',
                'field' => 'file'
            ],

            'diploma' => [
                'title' => 'Diplôme',
                'field' => 'file'
            ],

           
        ];

        if (Route::currentRouteName() == 'staff.edit') {
            $fields['created_at'] = [
                'title' => 'Date de début',
                'field' => 'date'
            ];
        }

        return $fields;
        
    }

}
