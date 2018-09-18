<?php

namespace App\Http\Controllers\User;

use App\Model\User\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //

    public function store(Request $request){

        $this->validate(request(), [

            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',

        ]);


        $input =  $request->all();

        $contact =  new Contact;

        $contact->name =  $request->name;
        $contact->email =  $request->email;
        $contact->subject =  $request->subject;
        $contact->message =  $request->message;

        $contact->save();

        return back()->with('message', 'Your response has been submitted successfully. You will be contacted soon');

    }

}
