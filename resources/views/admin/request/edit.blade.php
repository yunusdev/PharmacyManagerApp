@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Request</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('request.update', $request->id)}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}

                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">

                                    <div class="form-group">
                                        <label>Select Supplier</label>
                                        {{--<select  name="categories[]" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
                                        <select name="supplier_id" class="form-control" >
                                            <option selected disabled>Select a Supplier</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}"

                                                        @if($request->supplier->id == $supplier->id)

                                                             selected

                                                        @endif

                                                >{{$supplier->name}}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label for="name">Day Expected</label>
                                        <input type="date" value="{{$request->day}}" class="form-control" name="day" id="day" placeholder="Enter Day" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{route('request.index')}}" class="btn btn-danger">Back</a>

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