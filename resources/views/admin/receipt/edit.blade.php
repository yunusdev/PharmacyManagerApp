@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit an Receipt Client Name</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" method="post" action="{{route('receipt.update', $receipt->id)}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}

                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">

                                    <div class="form-group">
                                        <label for="client_name">Client Name</label>
                                        <input type="text" class="form-control" name="client_name" value="{{$receipt->client_name}}" id="client_name" placeholder="Enter Name" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{route('invoice.index')}}" class="btn btn-danger">Back</a>

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