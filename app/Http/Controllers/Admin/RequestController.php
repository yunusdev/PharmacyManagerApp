<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\RequestProduct;
use App\Model\Admin\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;


class RequestController extends Controller
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
        $requests = \App\Model\Admin\Request::all();

        return view('admin.request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $suppliers = Supplier::all();

        return view('admin.request.create', compact('suppliers'));

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

            'supplier_id' => 'required',
            'day' => 'required',
        ]);

        $requesting = new \App\Model\Admin\Request;

        $requesting->supplier_id  = $request->supplier_id;
        $requesting->request_no  = str_random(7);
        $requesting->day = $request->day;

        $requesting->save();

        return redirect(route('request.index'))->with('message', 'Request Created Successfully');


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

        $suppliers = Supplier::all();

        $request = \App\Model\Admin\Request::find($id);

        return view('admin.request.edit', compact('request', 'suppliers'));

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

            'supplier_id' => 'required',
            'day' => 'required',
        ]);

        $requesting = \App\Model\Admin\Request::find($id);

        $requesting->supplier_id  = $request->supplier_id;
        $requesting->day = $request->day;

        $requesting->save();

        return redirect(route('request.index'))->with('message', 'Request Updated Successfully');

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
        \App\Model\Admin\Request::find($id)->delete();

        return back();
    }

    public function pdf(\App\Model\Admin\Request $request){

//        $invoice = Invoice::find($invoicing);


        $requestProducts = RequestProduct::where('request_id', $request->id)->get();

        $SumAll = \App\Model\Admin\Request::find($request)->sum('sub_total');

        $pdf = PDF::loadView('admin.request.requestProduct.pdf', compact('requestProducts','SumAll', 'request'));

        return $pdf->download('request_'. $request->supplier->name . '.pdf');

    }

    public function receiptProduct(\App\Model\Admin\Request $request ){

        $requestProducts = RequestProduct::where('request_id', $request->id)->get();

//        $SumAll = Receipt::find($receipt)->sum('sub_total');

        return view('admin.request.requestProduct.index', compact('request','products','requestProducts','SumAll'));


    }

    public function requestProductStore(Request $request, $requesting){


        $this->validate(request(), [
            'name' => 'required',
            'quantity' => 'required',

        ]);

        $req = \App\Model\Admin\Request::find($requesting);

        $input =  $request->all();

        $reqPro =  new RequestProduct;

        $reqPro->request_id = $req->id;

        $reqPro->name = $request->name;

        $reqPro->quantity = $request->quantity;

        $reqPro->save();

        return back()->with('message', 'Product of the Request Created Successfully');

    }

    public function requestProductEdit($requestProduct){

        $reqPro = RequestProduct::find($requestProduct);

        return view('admin.request.requestProduct.edit', compact('reqPro'));


    }


    public function requestProductUpdate(Request $request, $requestProduct){


        $this->validate(request(), [
            'name' => 'required',
            'quantity' => 'required',

        ]);



        $input =  $request->all();

        $reqPro = RequestProduct::find($requestProduct);

        $req = \App\Model\Admin\Request::where('id', $reqPro->request_id)->first();


//        $reqPro->request_id = $req->id;

        $reqPro->name = $request->name;

        $reqPro->quantity = $request->quantity;

        $reqPro->save();

        return redirect(route('requestProduct.index', $req->id))->with('message_update', 'Product of Request Updated Successfully');

    }

    public function requestProductDestroy($requestProduct){

        RequestProduct::find($requestProduct)->delete();

        return back()->with('message_delete', 'Product of Request Deleted Successfully');

    }

    public function mail(Request $request, $requesting){

        $this->validate(request(), [

            'to' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'attachment' => 'required:pdf,jpeg,png,gif,svg,txt,pdf,ppt,docx,doc,xls',
        ]);

        $req = \App\Model\Admin\Request::find($requesting);

        $user = $req->supplier->name;

        $all =  $request->all();

        Mail::send('admin.request.requestProduct.email', compact('all','user'),  function ($message) use ($all, $user){

            $message->from('testinglaravel96@gmail.com')
                    ->to('yunusabdulqudus1@gmail.com')
                    ->subject('Nice')
                    ->attach($all['attachment']->getRealPath(),   array(
                            'as' => 'attachment_' . $user .'.' . $all['attachment']->getClientOriginalExtension(),
                            'mime' => $all['attachment']->getMimeType(),
                    ));
        });

        return back()->with('message', 'The mail has been sent Successfully');

    }


}
