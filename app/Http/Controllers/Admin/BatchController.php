<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Batch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $batches = Batch::all();

        return view('admin.batch.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('admin.batch.create');
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
            'exp_date' => 'required',
            'quantity' => 'required',


        ]);

        $input =  $request->all();

        $batch = new Batch;

        $batch->exp_date = $request->name;

        $batch->quantity =  $request->quantity;

        $batch->save();


        return redirect(route('batch.index'))->with('message', 'Your Category has been created successfully');

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
        $batch = Batch::findOrfail($id);

        return view('admin.category.edit', compact('batch'));

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
        //
        $this->validate(request(), [
            'exp_date' => 'required',
            'quantity' => 'required',


        ]);


        $input =  $request->all();

        $batch = Batch::findOrfail($id);

        $batch->exp_date = $request->name;

        $batch->quantity =  $request->quantity;

        $batch->save();


        return redirect(route('batch.index'))->with('message', 'Your Batch has been updated successfully');

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
        Batch::findOrFail($id)->delete();

        return redirect(route('batch.index'))->with('message', 'Your Batch has been deleted successfully');
    }
}
