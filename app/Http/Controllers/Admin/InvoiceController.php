<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Invoice;
use App\Model\Admin\InvoiceProduct;
use App\Model\Admin\Product;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

use Barryvdh\Snappy\Facades\SnappyPdf as SnappyPdf;
use Illuminate\Support\Facades\Mail;

//use PDF;

class InvoiceController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        $invoices = Invoice::all();

        return view('admin.invoice.index', compact('invoices'));

    }

    public function create(){

        return view('admin.invoice.create');

    }

    public function store(Request $request){

        $this->validate(request(), [
            'client_name' => 'required',

        ]);


        $input =  $request->all();

        $invoice =  new Invoice;

        $invoice->invoice_no = str_random(7);

        $invoice->client_name = $request->client_name;

        $invoice->sub_total =  0;

        $invoice->save();

        return redirect(route('invoice.index'));



    }

    public function edit($id)
    {
        //
        $invoice = Invoice::findOrFail($id);

        return view('admin.invoice.edit', compact('invoice'));

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

        $invoice = Invoice::findOrFail($id);

        $invoice->client_name = $request->client_name;

        $invoice->save();

        return redirect(route('invoice.index'))->with('message_update', 'Updated Successfully');
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
        Invoice::findOrFail($id)->delete();

        return back()->with('message_delete', 'Deleted Successfully');

    }


    public function invoiceProduct(Invoice $invoice){

        $products = Product::all();

        $invoiceProducts = InvoiceProduct::where('invoice_id', $invoice->id)->get();

        $SumAll = Invoice::find($invoice)->sum('sub_total');

//
        return view('admin.invoice.invoiceProduct.index', compact('invoice','invoiceProducts','products','SumAll'));

    }

    public function pdf(Invoice $invoice){

//        $invoice = Invoice::find($invoicing);

        $products = Product::all();

        $invoiceProducts = InvoiceProduct::where('invoice_id', $invoice->id)->get();

        $SumAll = Invoice::find($invoice)->sum('sub_total');

        $ding = 'ADEbiyi';

//        $pdf = PDF::loadView('admin.invoice.invoiceProduct.pdf', compact('invoice','products', 'invoiceProducts', 'SumAll'));
        $pdf = PDF::loadView('admin.invoice.invoiceProduct.pdf', compact('ding','invoiceProducts','SumAll', 'invoice'));


        return $pdf->download('invoice'. $invoice->client_name . '.pdf');

    }



    public  function invoiceProductStore(Request $request, $invoice){


        $this->validate(request(), [
            'name' => 'required',
            'quantity' => 'required',

        ]);


        $invoicing = Invoice::find($invoice);

        $input =  $request->all();

        $invoice =  new InvoiceProduct;

        $invoice->invoice_id = $invoicing->id;

        $invoice->name = $request->name;

        $product = Product::where('name', $request->name)->first();

        $invoice->price = $product->price;

        $invoice->quantity = $request->quantity;

        $invoice->total = $request->quantity * $product->price;

        $invoice->save();

        $sum = InvoiceProduct::where('invoice_id', $invoicing->id)->sum('total');

        $invoicing->sub_total = $sum;

        $invoicing->save();

        return back();

    }

    public function invoiceProductEdit($invoiceProduct){

        $products = Product::all();

        $iProduct = InvoiceProduct::find($invoiceProduct);

        return view('admin.invoice.invoiceProduct.edit', compact('iProduct','products'));


    }
    public function invoiceProductUpdate(Request $request, $invoiceProduct){

        $this->validate(request(), [
            'name' => 'required',
            'quantity' => 'required',

        ]);



        $input =  $request->all();

        $invoice =   InvoiceProduct::find($invoiceProduct);

        $invoicing = Invoice::where('id', $invoice->invoice_id)->first();


//        $invoice->invoice_id = $invoicing->id;

        $invoice->name = $request->name;

        $product = Product::where('name', $request->name)->first();

        $invoice->price = $product->price;

        $invoice->quantity = $request->quantity;

        $invoice->total = $request->quantity * $product->price;

        $invoice->save();

        $sum = InvoiceProduct::where('invoice_id', $invoicing->id)->sum('total');

        $invoicing->sub_total = $sum;

        $invoicing->save();

        return redirect(route('invoiceProduct.index', $invoicing->id));

    }

    public function invoiceProductDestroy($invoiceProduct){

        $invoice =   InvoiceProduct::find($invoiceProduct);

        $invoicing = Invoice::where('id', $invoice->invoice_id)->first();

        $inv = InvoiceProduct::find($invoiceProduct)->delete();


        $sum = InvoiceProduct::where('invoice_id', $invoicing->id)->sum('total');

        $invoicing->sub_total = $sum;

        $invoicing->save();

        return back();


    }

    public function mail(Request $request, $invoice){

        $this->validate(request(), [

            'to' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'attachment' => 'required:pdf,jpeg,png,gif,svg,txt,pdf,ppt,docx,doc,xls',
        ]);

        $req = Invoice::find($invoice);

        $user = $req->client_name;

        $all =  $request->all();

        Mail::send('admin.invoice.invoiceProduct.email', compact('all','user'),  function ($message) use ($all, $user){

            $message->from('testinglaravel96@gmail.com')
                ->to('yunusabdulqudus1@gmail.com')
                ->subject('Nice')
                ->attach($all['attachment']->getRealPath(),   array(
                    'as' => 'attachment_' . $user .'.' . $all['attachment']->getClientOriginalExtension(),
                    'mime' => $all['attachment']->getMimeType(),
                ));
        });

        return back()->with('message', 'The mail has been sent to the Customer Successfully');

    }
}
