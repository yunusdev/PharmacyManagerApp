@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit a Supplier</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('supplier.update', $supplier->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name"> Supplier Name</label>
                                        <input type="text" class="form-control" value="@if(old('name')) {{old('name')}} @else {{$supplier->name}} @endif"  name="name" id="name" placeholder="Enter category" required>
                                    </div>

                                    <div class="form-group ">
                                        <label for="email"> Email</label>
                                        <input type="email" class="form-control" value="@if(old('email')) {{old('email')}} @else {{$supplier->email}} @endif" name="email" id="email" placeholder="Enter  email ">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="number" value=" {{$supplier->phone}} " class="form-control"   name="phone" id="phone" placeholder="Enter  number ">
                                    </div>

                                    <div class="form-group">
                                        <label for="name"> Supplier Address</label>
                                        <input type="text" class="form-control" value="@if(old('address')) {{old('address')}} @else {{$supplier->address}} @endif"  name="address" id="address" placeholder="Enter address" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{route('supplier.index')}}" class="btn btn-danger">Back</a>

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