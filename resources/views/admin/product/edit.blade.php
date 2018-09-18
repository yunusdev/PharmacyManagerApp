@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Edit a Product</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="col-lg-6 col-lg-offset-3">
                            @include('includes.form_error')
                        </div>
                        <form role="form" method="post" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group col-lg-12">
                                        <label for="name"> Name</label>
                                        <input type="text" class="form-control"value="{{old('name') ? old('name') : $product->name}}" name="name" id="name" placeholder="Enter  username">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="name"> Quantity</label>
                                        <input type="number" class="form-control"value="{{old('quantity') ? old('quantity') : $product->quantity}}" name="quantity" id="quantity" placeholder="Enter  username">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="name"> Price</label>
                                        <input type="number" class="form-control"value="{{old('price') ? old('price') : $product->price}}" name="price" id="price" placeholder="Enter  username">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="unit"> Unit</label>
                                        <input type="text" class="form-control"value="{{old('unit') ? old('unit') : $product->unit}}" name="unit" id="unit" placeholder="Enter  username">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="name">Expiry Date</label>
                                        <input type="date" class="form-control" value="{{old('expiry_date') ? old('expiry_date') : $product->expiry_date}}" name="expiry_date" id="expiry_date" placeholder="Enter Expiry Date" required>
                                    </div>


                                    <div class="form-group col-lg-6">
                                        <label for="photo_id">Product Pic</label>
                                        <input type="file" id="photo_id" name="photo_id">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label>Message</label>
                                        <textarea rows="10" class="form-control" placeholder="Place other detail....." id="detail" name="detail" required>{{old('detail') ? old('detail') : $product->detail}}</textarea>
                                    </div>

                                    <div class=" form-group col-lg-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{route('product.index')}}" class="btn btn-danger">Back</a>
                                    </div>
                                </div>

                            </div>



                        </form>

                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@section('scripts')



@endsection


@endsection