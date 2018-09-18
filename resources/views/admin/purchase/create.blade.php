@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create A Purchase</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('purchase.store')}}">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="seller">Seller/Worker</label>
                                        <input type="text" class="form-control" value="{{old('seller')}}"  name="seller" id="seller" placeholder="Enter seller" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control"  value="{{old('price')}}" name="price" id="price" placeholder="Enter  price ">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Date of Purchase</label>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="Enter Date" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea  class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{route('purchase.index')}}" class="btn btn-danger">Back</a>

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