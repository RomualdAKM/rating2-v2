<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Mail\InfoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class InfoController extends Controller
{   

    public function info(Request $request){
        
            session(['info' => true]);

            $prix = $request->input('prix');
        
            session(['prix' => $prix]);
           
            return view('information', ['prix' => $prix]);
    }


    public function store(Request $request)
    {   
        //dd($request->prix);
        //dd($request->all());
        // $validatedData = $request->validate([
        //     'logo' => 'required',
        //     'name_structure' => 'required|string|max:255',
        //     'email_structure' => 'required|email|max:255',
        //     'name_admin' => 'required|string|max:255',
        //     'email_admin' => 'required|email|max:255',
        //     'adress' => 'required|string|max:255',
        //     'phone' => 'required|numeric',
        //     'city' => 'required|string|max:255',
        //     'postal' => 'required|numeric',
        //     'promo' => 'required',
        // ]);

        // dd($request->promo);
       
        if(($request->promo !== "CHR23") && ($request->promo !== "ANG23") && ($request->promo !== "SOL23") && ($request->promo !== "CEL23") && ($request->promo !== "ANT23") && ($request->promo !== "TWT23") && ($request->promo !== "WHT23") && ($request->promo !== "FBT23")){

            Alert::error('Error', 'Code Invalide');

            return view('information', ['prix' => session('prix')]);
 
             
        }else{

            
              $info = new Info();
              $info->name_structure = $request->name_structure;
              $info->email_structure = $request->email_structure;
              $info->name_admin = $request->name_admin;
              $info->email_admin = $request->email_admin;
              $info->adress = $request->adress;
              $info->phone = $request->phone;
              $info->city = $request->city;
              $info->postal = $request->postal;
              $info->promo = $request->promo;
              // $info->name_structure = $validatedData['name_structure'];
              // $info->email_structure = $validatedData['email_structure'];
              // $info->name_admin = $validatedData['name_admin'];
              // $info->email_admin = $validatedData['email_admin'];
              // $info->adress = $validatedData['adress'];
              // $info->phone = $validatedData['phone'];
              // $info->city = $validatedData['city'];
              // $info->postal = $validatedData['postal'];
              // $info->promo = $validatedData['promo'];
      
              if ($request->hasFile('logo')) {
                  $fileName = time() . '.' . $request->logo->extension();
                  // $path = $request->file('logo')->storeAs('logos', $fileName, 'public');
                  
                  $request->logo->move(public_path('storage'), $fileName);
                  $path = $fileName;
                  $info->logo = $path;
              }
              $info->save();
              
              Mail::to('prodigitservices@gmail.com')->send(new InfoMail($request->name_structure,$request->email_structure,$request->name_admin,$request->email_admin,$request->adress,$request->phone,$request->city,$request->postal,$request->promo,$request->prix));
      
             
              Alert::toast("Données enregistrées", 'success');

              session(['info' => false]);
              
              return view('information', ['prix' => session('prix')]);
      
              // return redirect()->back();
        }
       
     

    }
}
