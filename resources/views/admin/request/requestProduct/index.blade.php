@extends('admin.layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">



@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content">

            <!-- Default box -->



                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            @include('includes.form_error')
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Request </h3>
                            </div>
                            <div class=" col-lg-4 col-lg-offset-4" style="background-color: #2ac7a3; color: white; font-weight: bold; border-radius: 10%;padding: 20px;margin-top: 40px;margin-bottom: 40px">

                                <p>Request No: {{$request->request_no}}</p>
                                <p>Supplier Name: {{$request->supplier->name}}</p>
                                <p>Date Expecting Goods: {{$request->day}}</p>
                                <h4 ><a style="color: white"href="{{route('request.pdf', $request->id)}}"><i style="margin-right: 5px" class="glyphicon glyphicon-download-alt"></i>Download Request</a></h4>
                                {{--                                <h4 style="color: white"><a href="{{route('invoice.pdf', $invoice->id)}}">Download</a></h4>--}}

                                <h6 style="margin-top: 20px">PS: Download only after adding the products</h6>

                            </div>

                            <div class="col-md-8 col-md-offset-2" style="background-color: #fafafa; padding: 10px">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Send The Document to the Supplier if needed</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <form role="form" method="post" action="{{route('request.email', $request->id)}}" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="box-body">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="to" value="yunusabdulqudus1@gmail.com" placeholder="To:">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control"  type="text" name="subject" placeholder="Subject:">
                                        </div>
                                        <div class="form-group">
                                            <textarea id="compose-textarea"  name="content" class="form-control" style="height: 300px">
                                              <h1><u>Supply Request</u></h1>
                                              <p></p>

                                              <p>Thank you,</p>
                                              <p>{{$request->supplier->name}}</p>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Attachment
                                                <input type="file" name="attachment">
                                            </div>
                                            {{--<p class="help-block">Max. 32MB</p>--}}
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                                        </div>
                                    </div>
                                    </form>

                                    <!-- /.box-footer -->
                                </div>
                                <!-- /. box -->
                            </div>

                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('requestProduct.store', $request->id)}}">
                                {{csrf_field()}}
                                <div class="box-body">
                                    <div class="col-lg-6 col-lg-offset-3">

                                        <div class="form-group">
                                            <label for="quantity"> Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity"> Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            {{--<a href="{{route('invoice.index')}}" class="btn btn-danger">Back</a>--}}

                                        </div>
                                    </div>

                                </div>



                            </form>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body adScroll">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th> Name</th>
                                    <th>Quantity</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($requestProducts)
                                    @foreach($requestProducts as $requestProduct)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$requestProduct->name}}</td>
                                            <td>{{$requestProduct->quantity}}</td>
                                            <td><a href="{{route('requestProduct.edit', $requestProduct->id)}}"><span class="fa fa-edit"></span></a></td>
                                            <td>
                                                <form method="post" id="delete-form-{{$requestProduct->id}}" action="{{route('requestProduct.destroy', $requestProduct->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$requestProduct->id}}').submit();}
                                                        else
                                                        {event.preventDefault();}">
                                                    <span class="fa fa-trash" style="color: red"></span>
                                                </a>
                                            </td>
                                            <td>{{$requestProduct->created_at->diffForHumans()}}</td>
                                            <td>{{$requestProduct->updated_at->diffForHumans()}}</td>

                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th> Name</th>
                                    <th>Quantity</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@section('scripts')

    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>



    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    <script>
        $(function () {
            $('#example1').DataTable()

        })
    </script>

    <script>
        $(function () {
            //Add text editor
            $("#compose-textarea").wysihtml5();
        });
    </script>

@endsection


@endsection

