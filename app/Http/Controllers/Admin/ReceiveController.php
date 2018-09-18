<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Receive;
use App\Model\Admin\Supplier;
use App\Model\User\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceiveController extends Controller
{
    //

    public function index(){

        $receives = Receive::all();

        $suppliers = Supplier::all();

        return view('admin.receive.index', compact('receives','all'));

    }

    public function create(){

        $suppliers = Supplier::all();

        return view('admin.receive.create', compact('suppliers'));

    }

    public function show($id){

        $receive = Receive::find($id);

        return view('admin.receive.show', compact('receive'));


    }


    public function store(Request $request){



        $input = $request->all();

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('ReceivePics', $name);

            $photo = Photo::create(['path'=>$name]);

        }

        $receive = new Receive;

        $receive->document_number = $request->document_number;

        $receive->supplier_id = $request->supplier_id;

        $receive->photo_id = $photo->id;

        $receive->description = $request->description;

        $receive->save();

        return redirect(route('receive.index'))->with('message', 'It has been added successfully');


    }

    public function destroy($id)
    {
        //
        $receive = Receive::find($id);

        unlink(public_path('/ReceivePics/') . $receive->photo->path);

        $receive->delete();

        return back()->with('message_delete', 'The Receive has been deleted successfully');

    }
}
