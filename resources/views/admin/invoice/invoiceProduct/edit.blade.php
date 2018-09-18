@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit an Invoice {{$iProduct->invoice_no}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('invoiceProduct.update', $iProduct->id)}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}

                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">

                                    <div class="form-group">
                                        <label>Select Product</label>
                                        {{--<select  name="categories[]" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
                                        <select name="name" class="form-control" >
                                            <option selected disabled>Select a Product</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->name}}"

                                                    @if($iProduct->name == $product->name)

                                                        selected

                                                    @endif

                                                >{{$product->name}},  Price {{$product->price}}, Qty in Store {{$product->quantity}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="quantity"> Quantity</label>
                                        <input type="number" class="form-control" value="{{$iProduct->quantity}}" name="quantity" id="quantity" placeholder="Enter quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price"> Price</label>
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="total"> Total</label>
                                        <input type="number" class="form-control" name="total" id="total" placeholder="Enter total" disabled>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        {{--                                            <a href="{{route('invoice.index')}}" class="btn btn-danger">Back</a>--}}

                                    </div>
                                </div>

                            </div>



                        </form>

                        @include('includes.form_error')
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

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>


@endsection


@endsection