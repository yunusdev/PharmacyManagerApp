@extends('admin.layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content">

            <!-- Default box -->
            <div class="box">


                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            @include('includes.form_error')
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Make a Receipt </h3>
                            </div>
                            <div class=" col-lg-4 col-lg-offset-4" style="background-color: #c74e92; color: white; font-weight: bold; border-radius: 10%;padding: 20px;margin-top: 40px;margin-bottom: 40px">

                                <p>Receipt No: {{$receipt->receipt_no}}</p>
                                <p>Client Name: {{$receipt->client_name}}</p>
                                <p style="">Total: N{{$receipt->sub_total}}</p>
                                <h4 ><a style="color: white"href="{{route('receipt.pdf', $receipt->id)}}"><i style="margin-right: 5px" class="glyphicon glyphicon-download-alt"></i>Download</a></h4>

                                <h6 style="margin-top: 20px">PS: Download only after adding the products</h6>


                            </div>

                            <div class="col-md-8 col-md-offset-2" style="background-color: #fafafa; padding: 10px">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Print The Document to the Client if needed</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <form role="form" method="post" action="{{route('receipt.email', $receipt->id)}}" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="box-body">

                                            <div class="form-group">
                                                <input class="form-control" type="email" name="to" value="yunusabdulqudus1@gmail.com" placeholder="To:">
                                            </div>

                                            <div class="form-group">
                                                <input class="form-control"  type="text" name="subject" placeholder="Subject:">
                                            </div>
                                            <div class="form-group">
                                             <textarea   name="content" class="form-control" style="height: 150px">Content:
                                            </textarea>
                                            </div>
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
                            <form role="form" method="post" action="{{route('receiptProduct.store', $receipt->id)}}">
                                {{csrf_field()}}
                                <div class="box-body">
                                    <div class="col-lg-6 col-lg-offset-3">

                                        <div class="form-group">
                                            <label>Select Category</label>
                                            {{--<select  name="categories[]" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
                                            <select name="name" class="form-control" >
                                                <option selected disabled>Select a product</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->name}}">{{$product->name}},  Price {{$product->price}}, Qty in Store {{$product->quantity}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="quantity"> Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" required>
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

                        <!-- /.box-header -->
                        <div class="box-body adScroll">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th> Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($receiptProducts)
                                    @foreach($receiptProducts as $receiptProduct)
                                        <tr>
                                            <td>{{$receiptProduct->id}}</td>
                                            <td>{{$receiptProduct->name}}</td>
                                            <td>{{$receiptProduct->quantity}}</td>
                                            <td>{{$receiptProduct->price}}</td>
                                            <td>{{$receiptProduct->total}}</td>
                                            <td><a href="{{route('receiptProduct.edit', $receiptProduct->id)}}"><span class="fa fa-edit"></span></a></td>
                                            <td>
                                                <form method="post" id="delete-form-{{$receiptProduct->id}}" action="{{route('receiptProduct.destroy', $receiptProduct->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$receiptProduct->id}}').submit();}
                                                        else
                                                        {event.preventDefault();}">
                                                    <span class="fa fa-trash" style="color: red"></span>
                                                </a>
                                            </td>
                                            <td>{{$receiptProduct->created_at->diffForHumans()}}</td>
                                            <td>{{$receiptProduct->updated_at->diffForHumans()}}</td>

                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td></td>
                                    <th>Total Sum: </th>
                                    <td></td>
                                    <td></td>
                                    <th>N{{$SumAll}}</th>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th> Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
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
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@section('scripts')

    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


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

@endsection


@endsection

