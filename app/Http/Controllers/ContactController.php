<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->contenu = $request->contenu;
        Mail::to('prodigitservices@gmail.com')->send(new ContactMail($request->name,$request->email,$request->subject,$request->contenu));

        Mail::to('romuald91303142@gmail.com')->send(new ContactMail($request->name, $request->email, $request->subject, $request->contenu));

        $contact->save();
        return redirect()->back();
    }
}
