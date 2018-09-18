<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //

    public function index(){

        $contacts = Contact::all();

        return view('admin.contact.index', compact('contacts'));


    }

    public function destroy($id){

        Contact::findOrFail($id)->delete();

        return back()->with('message_delete', 'The Message has been deleted Successfully');

    }


}
