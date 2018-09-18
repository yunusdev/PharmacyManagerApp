@extends('admin.layouts.app')


@section('styles')

    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">



@endsection

@section('content')


    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Make New Request</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('receive.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">

                                    <div class="form-group">
                                        <label>Select Supplier</label>
                                        <select name="supplier_id" class="form-control" >
                                            <option selected disabled>Select a Supplier</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group col-lg-12 ">
                                        <label for="name col-lg-6"> Document Number</label>
                                        <input type="number" class="form-control"value="{{old('document_number')}}" name="document_number" id="document_number" placeholder="Enter  Document Number">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="photo_id">Profile Pic</label>
                                        <input type="file" id="photo_id" name="photo_id">
                                    </div>

                                    <div class="form-group">
                                            <textarea id="compose-textarea"  name="description" class="form-control" style="height: 300px">
                                              <h1><u>Supply Request</u></h1>
                                              <p></p>

                                              <p>Thank you,</p>
                                              <p>hjrgdgd</p>
                                            </textarea>
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

    <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>


    <script>
        $(function () {
            //Add text editor
            $("#compose-textarea").wysihtml5();
        });
    </script>

@endsection


@endsection