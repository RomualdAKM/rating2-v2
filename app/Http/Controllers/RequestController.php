<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Structure;
use App\Models\Solicitation;
use Illuminate\Http\Request;
use App\Mail\SolicitationAdminMail;
use App\Mail\SolicitationStaffMail;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function index(Request $request, $id)
    {
        if ($request->isMethod('post')) {

           // dd($request->all());

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'contact' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'object_solicitation' => 'required|string|max:255',
                'description_solicitation' => 'required|string',
                // 'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:2048',
            ]);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $pathFileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $pathFileName);
                $pathFile = $pathFileName;
            }

            $structure = Structure::findOrFail($id);

            $solicitation = new Solicitation();
            $solicitation->name = $request->name;
            $solicitation->contact = $request->contact;
            $solicitation->email = $request->email;
            $solicitation->structure_id = $structure->id;
            $solicitation->object_solicitation = $request->object_solicitation;
            $solicitation->description_solicitation = $request->description_solicitation;
            $solicitation->file = $pathFile ?? null;
            $solicitation->save();

            $admin = User::where('role', 'admin')->where('structure_id', $structure->id)->first();

            Mail::to($admin->email)->send(new SolicitationAdminMail($request->name));

            Mail::to($request->email)->send(new SolicitationStaffMail($request->name));


            return redirect()->back()->with('success', 'Votre demande a été soumise avec succès.');
        }

        $structure = Structure::findOrFail($id);


       
        return view('solicitation', compact('structure'));

    }


}
