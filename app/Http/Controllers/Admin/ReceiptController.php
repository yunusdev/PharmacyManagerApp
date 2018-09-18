<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Product;
use App\Model\Admin\Receipt;
use App\Model\Admin\ReceiptProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class ReceiptController extends Controller
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
        $receipts = Receipt::all();

        $totalAll = Receipt::sum('sub_total');


        return view('admin.receipt.index', compact('receipts','totalAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.receipt.create');

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
            'client_name' => 'required',

        ]);


        $input =  $request->all();

        $receipt =  new Receipt;

        $receipt->receipt_no = str_random(8);

        $receipt->client_name = $request->client_name;

        $receipt->sub_total =  0;

        $receipt->save();

        return redirect(route('receipt.index'))->with('message', 'The Receipt Client Name has been created successfully . Click On the receipt no to further');


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
        $receipt = Receipt::findOrFail($id);

        return view('admin.receipt.edit', compact('receipt'));

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
            'client_name' => 'required',

        ]);


        $input =  $request->all();

        $receipt = Receipt::findOrFail($id);

        $receipt->client_name = $request->client_name;

        $receipt->save();

        return redirect(route('receipt.index'));

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
        Receipt::findOrFail($id)->delete();

        return back();
    }

    public function pdf(Receipt $receipt){

//        $invoice = Invoice::find($invoicing);

        $products = Product::all();

        $receiptProducts = ReceiptProduct::where('receipt_id', $receipt->id)->get();

        $SumAll = Receipt::find($receipt)->sum('sub_total');

        $pdf = PDF::loadView('admin.receipt.receiptProduct.pdf', compact('receiptProducts','SumAll', 'receipt'));

        return $pdf->download('receipt_'. $receipt->client_name . '.pdf');

    }

    public function receiptProduct(Receipt $receipt){


        $products = Product::all();

        $receiptProducts = ReceiptProduct::where('receipt_id', $receipt->id)->get();

        $SumAll = Receipt::find($receipt)->sum('sub_total');

        return view('admin.receipt.receiptProduct.index', compact('receipt','products','receiptProducts','SumAll'));


    }

    public function receiptProductStore(Request $request, $receipt){



          $this->validate(request(), [
              'name' => 'required',
              'quantity' => 'required',

          ]);


          $rec = Receipt::find($receipt);

          $input =  $request->all();

          $receiptProduct =  new ReceiptProduct;

          $receiptProduct->receipt_id = $rec->id;

          $receiptProduct->name = $request->name;

          $product = Product::where('name', $request->name)->first();

          $receiptProduct->price = $product->price;

          $receiptProduct->quantity = $request->quantity;

          $receiptProduct->total = $request->quantity * $product->price;

          $receiptProduct->save();

          $sum = ReceiptProduct::where('receipt_id', $rec->id)->sum('total');

          $rec->sub_total = $sum;

          $rec->save();

          $product->quantity = $product->quantity - $request->quantity;

          $product->save();

          return back();


    }

    public function receiptProductEdit($receiptProduct){


        $products = Product::all();

        $rProduct = ReceiptProduct::find($receiptProduct);

        return view('admin.receipt.receiptProduct.edit', compact('rProduct','products'));

    }
    public function receiptProductUpdate(Request $request, $receiptProduct){


        $this->validate(request(), [
            'name' => 'required',
            'quantity' => 'required',

        ]);



        $input =  $request->all();

        $receipt =   ReceiptProduct::find($receiptProduct);

        $now = $receipt->quantity;

        $rec = Receipt::where('id', $receipt->receipt_id)->first();

//        $invoice->invoice_id = $invoicing->id;

        $receipt->name = $request->name;

        $product = Product::where('name', $request->name)->first();

        $receipt->price = $product->price;

        $receipt->quantity = $request->quantity;

        $receipt->total = $request->quantity * $product->price;

        $receipt->save();

        $sum = ReceiptProduct::where('receipt_id', $rec->id)->sum('total');

        $rec->sub_total = $sum;

        $rec->save();

        $product->quantity = $product->quantity  + $now - $request->quantity;

        $product->save();

        return redirect(route('receiptProduct.index', $rec->id));

    }

    public function receiptProductDestroy($receiptProduct){

        $rec =   ReceiptProduct::find($receiptProduct);

        $qty = $rec->quantity;

        $product = Product::where('name', $rec->name)->first();

        $recipe = Receipt::where('id', $rec->receipt_id)->first();

         ReceiptProduct::find($receiptProduct)->delete();

        $sum = ReceiptProduct::where('receipt_id', $recipe->id)->sum('total');

        $recipe->sub_total = $sum;

        $recipe->save();

        $product->quantity = $product->quantity + $qty;

        $product->save();

        return back();


    }

    public function mail(Request $request, $receipt){

        $this->validate(request(), [

            'to' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'attachment' => 'required:pdf,jpeg,png,gif,svg,txt,pdf,ppt,docx,doc,xls',
        ]);

        $req = Receipt::find($receipt);

        $user = $req->client_name;


        $all =  $request->all();

        Mail::send('admin.receipt.receiptProduct.email', compact('all'),  function ($message) use ($all, $user){

            $message->from('testinglaravel96@gmail.com')
                ->to('yunusabdulqudus1@gmail.com')
                ->subject('Nice')
                ->attach($all['attachment']->getRealPath(),   array(
                    'as' => 'attachment_'  . $user . '.' . $all['attachment']->getClientOriginalExtension(),
                    'mime' => $all['attachment']->getMimeType(),
                ));
        });

        return back()->with('message', 'The mail has been sent Successfully');

    }



}
