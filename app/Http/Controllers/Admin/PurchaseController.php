<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        //

        $purchases = Purchase::all();

        $sumAll = Purchase::sum('price');

        return view('admin.purchase.index', compact('purchases', 'sumAll'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.purchase.create');

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

        //
        $this->validate(request(), [

            'description' => 'required',
            'seller' => 'required',
            'price' => 'required',
            'date' => 'required',

        ]);

        $purchase = new Purchase;

        $purchase->seller = $request->seller;
        $purchase->description = $request->description;
        $purchase->price = $request->price;
        $purchase->date = $request->date;

        $purchase->save();

        return redirect(route('purchase.index'))->with('message', 'Your Purchase has been created successfully.');
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

        $purchase = Purchase::FindOrFail($id);

        return view('admin.purchase.edit', compact('purchase'));
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

            'description' => 'required',
            'seller' => 'required',
            'price' => 'required',
            'date' => 'required',

        ]);

        $purchase = Purchase::FindOrFail($id);

        $purchase->seller = $request->seller;
        $purchase->description = $request->description;
        $purchase->price = $request->price;
        $purchase->date = $request->date;

        $purchase->save();

        return redirect(route('purchase.index'))->with('message', 'Your Purchase has been created successfully.');

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
        $purchase = Purchase::FindOrFail($id)->delete();

        return back();

    }
}
