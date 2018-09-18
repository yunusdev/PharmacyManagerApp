<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Product;
use App\Model\Admin\Receipt;
use App\Model\User\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
        $products = Product::all();

        return view('admin.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if (auth('admin')->user()->can('product.create')) {


            return view('admin.product.create');

//        }
//
//        return back();


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
            'unit' => 'required',
            'quantity' => 'required',
            'expiry_date'=> 'required',
            'price' => 'required',
            'detail' => 'required',
//

        ]);

        $input = $request->all();

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('ProductPic', $name);

            $photo = Photo::create(['path'=>$name]);

//            $input['photo_id'] = $photo->id;

        }


        $product = new Product;

        $product->name = $request->name;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->expiry_date = $request->expiry_date;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->photo_id =  $photo->id;


        $product->save();
//

        return redirect(route('product.index'))->with('message', 'Your Product has been created successfully.');
    }

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

//        if (auth('admin')->user()->can('product.update')) {


            $product = Product::findOrFail($id);

            return view('admin.product.edit', compact('product'));


//        }
//
//        return back();

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
            'unit' => 'required',
            'quantity' => 'required',
            'expiry_date'=> 'required',
            'price' => 'required',
            'detail' => 'required',
//

        ]);

        $input = $request->all();

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('ProductPic', $name);

            $photo = Photo::create(['path'=>$name]);

//            $input['photo_id'] = $photo->id;

        }


        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->expiry_date = $request->expiry_date;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->photo_id =  $photo->id;


        $product->save();
//

        return redirect(route('product.index'))->with('message_update', 'Your Product has been edited successfully.');
    }


    public function addQuantity($product){

        $pro = Product::findOrFail($product);

        return view('admin.product.add.create', compact('pro'));

    }

    public function addQuantityPost(Request $request, $product){

        $pro = Product::findOrFail($product);

        $prop = $pro->quantity ;

        $pro->quantity = $prop + $request->quantity;

        $pro->save();

        return redirect(route('product.index'))->with('message', 'Product has been Incremented Successfully Has Been added Successfully');


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

        $product = Product::whereId($id)->first();

        unlink(public_path('/ProductPic/') . $product->photo->path);

        $product->delete();

        return redirect(route('product.index'))->with('message_delete', 'Your Product has been deleted successfully.');
    }
}
