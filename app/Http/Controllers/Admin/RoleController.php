<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Permission;
use App\Model\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
//        $this->middleware('can:admin.role');

    }

    public function index()
    {
        //
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));

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

            'name' => 'required|unique:roles',

        ]);

        $role = new Role;

        $role->name = $request->name;

        $role->save();

        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'))->with('message', 'Your Role has been created successfully.');
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
        $role = Role::FindOrFail($id);

        $permissions = Permission::all();


        return view('admin.role.edit', compact('role', 'permissions'));
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

        ]);

        $role =  Role::findOrFail($id);

        $role->name = $request->name;

        $role->save();

        $role->permissions()->sync($request->permission);


        return redirect(route('role.index'))->with('message_update', 'Your Role has been updated successfully.');
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
        Role::findOrFail($id)->delete();

        return redirect()->back()->with('message_delete', 'Your Role has been deleted successfully.');

    }
}
