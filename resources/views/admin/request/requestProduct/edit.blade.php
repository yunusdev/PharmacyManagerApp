@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit a Request</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" method="post" action="{{route('requestProduct.update', $reqPro->id)}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}

                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">

                                    <div class="form-group">
                                        <label for="quantity"> Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$reqPro->name}}" id="name" placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity"> Quantity</label>
                                        <input type="number" class="form-control" value="{{$reqPro->quantity}}" name="quantity" id="quantity" placeholder="Enter quantity" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        {{--<a href="{{route('invoice.index')}}" class="btn btn-danger">Back</a>--}}

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