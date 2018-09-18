@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Add Quantity to the Product {{$pro->name}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="col-lg-6 col-lg-offset-3">
                            @include('includes.form_error')
                        </div>
                        <form role="form" method="post" action="{{route('quantity.addSum', $pro->id)}}" >
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group col-lg-12">
                                        <label for="name"> Name</label>
                                        <input type="text" class="form-control"value="{{$pro->name}}" name="name" id="name" disabled>
                                    </div>

                                    <div class="col-lg-12" style="background-color: #2ac7a3; color: white; font-weight: bold; border-radius: 10%;padding: 20px;margin-top: 10px;margin-bottom: 10px">

                                        <p>The Current Number of the {{$pro->name}} in store is {{$pro->quantity}}</p>

                                    </div>

                                    <div class="form-group ">
                                        <label for="name">Increment Quantity</label>
                                        <input type="number" class="form-control"value="{{old('quantity')}}" name="quantity" id="quantity" placeholder="Increment Qantity">
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