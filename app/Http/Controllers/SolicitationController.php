<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Solicitation;
use Illuminate\Http\Request;
use App\Mail\SolicitationAlertMail;
use App\Mail\SolicitationStaffMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\StoreSolicitationRequest;
use App\Http\Requests\UpdateSolicitationRequest;


class SolicitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $structure = Auth::user()->structure;

        $qrCode = QrCode::size(200)->color(4, 14, 96)->generate(str_replace("solicitation", 'y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQ' . $structure->id, url()->current()));

        return view('app.solicitation.index', [
            'structure' => $structure,
            'qrCode' => $qrCode,
            'solicitations' => $structure->solicitations()->orderBy('created_at', 'desc')->get(),
           'my_actions' => $this->solicitation_actions(),
            'my_attributes' => $this->solicitation_columns(),
        ]);

    }

    public function print()
    {
        $structure = Auth::user()->structure;

        $qrcode = QrCode::size(200)->generate(str_replace('solicitation/print', 'y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQ' . $structure->id, url()->current()));

        $pdf = PDF::loadView('app.solicitation.print', compact('qrcode'));
        
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSolicitationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitation $solicitation)
    {

        //dd($solicitation);

        return view('app.solicitation.show', [
            'solicitation' => $solicitation,
            'my_fields' => $this->solicitation_fields(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitation $solicitation)
    {
        return view('app.solicitation.edit', [
            'solicitation' => $solicitation,
            'my_fields' => $this->solicitation_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSolicitationRequest $request, Solicitation $solicitation)
    {
        $solicitation->status = $request->status;

        Mail::to($solicitation->email)->send(new SolicitationAlertMail($solicitation->name,$solicitation->status));


        if ($solicitation->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('solicitation');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitation $solicitation)
    {
        //
    }

    private function solicitation_columns()
    {
        $columns = (object) array(
            'id' => 'Identifient',
            'name' => 'Nom',
            'contact' => "Contact",
            'email' => "Email",
            'status' => "Statut",
            'object_solicitation' => "Object",
            'description_solicitation' => "Description",
            // 'formatted_date' => 'Date'
           
        );

        return $columns;
    }

    private function solicitation_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
        );
        return $actions;
    }

    private function solicitation_fields()
    {
        if (Route::currentRouteName() == 'solicitation.show') {    
            $fields = [
                'name' => [
                    'title' => 'Nom et prénoms',
                    'field' => 'text'
                ],
                'contact' => [
                    'title' => 'Contact',
                    'field' => 'tel'
                ],
                'email' => [
                    'title' => 'Plainte',
                    'field' => 'email',
                ],
                'object_solicitation' => [
                    'title' => 'Plainte',
                    'field' => 'text',
              
                ],
                'description_solicitation' => [
                    'title' => 'Plainte',
                    'field' => 'textarea',
                    'colspan' => 'true'
                ],
               
            ];

        }
        if (Route::currentRouteName() == 'solicitation.edit') {    
            $fields = [
                'status' => [
                    'title' => 'Statut',
                    'field' => 'select',
                    'options' => [
                        'favorable' => 'Favorable',
                        'défavorable' => 'Défavorable', 
                    ]
                ],
            ];
        }

        return $fields;
    }
}
