<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all();

        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.client.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(), [

            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $client = new Client;

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->email = $request->email;

        $client->save();

        return redirect(route('client.index'))->with('message', 'Client Details Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $client = Client::findOrFail($id);

        return view('admin.client.edit', compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate(request(), [

            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $client = Client::findOrFail($id);


        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->email = $request->email;

        $client->save();

        return redirect(route('client.index'))->with('message_update', 'Client Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Client::findOrFail($id)->delete();

        return back()->with('message_delete', 'Client Details Deleted Successfully');
    }
}
