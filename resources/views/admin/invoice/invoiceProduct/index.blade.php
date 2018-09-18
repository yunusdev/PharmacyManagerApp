@extends('admin.layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">



@endsection

@section('content')

    <div class="content-wrapper">

        <section class="content">


                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            @include('includes.form_error')
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Make an Invoice </h3>
                            </div>
                            <div class=" col-lg-4 col-lg-offset-4" style="background-color: #00A6C7; color: white; font-weight: bold; border-radius: 10%;padding: 20px;margin-top: 40px;margin-bottom: 40px">

                                <p>Invoice No: {{$invoice->invoice_no}}</p>
                                <p>Client Name: {{$invoice->client_name}}</p>
                                <p style="">Total: N{{$invoice->sub_total}}</p>
                                <h4 ><a  style="color: white"href="{{route('invoice.pdf', $invoice->id)}}"><i style="margin-right: 5px" class="glyphicon glyphicon-download-alt"></i> Download Invoice</a></h4>

                                <h6 style="margin-top: 20px">PS: Download only after adding the products</h6>

                            </div>

                            <div class="col-md-8 col-md-offset-2" style="background-color: #fafafa; padding: 10px">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Send The Document to the Client if needed</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <form role="form" method="post" action="{{route('invoice.email', $invoice->id)}}" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="box-body">
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="to" value="yunusabdulqudus1@gmail.com" placeholder="To:">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control"  type="text" name="subject" placeholder="Subject:">
                                            </div>
                                            <div class="form-group">
                                            <textarea   name="content" placeholder="Content:" class="form-control" style="height: 150px">
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
                            <form role="form" method="post" action="{{route('invoiceProduct.store', $invoice->id)}}">
                                {{csrf_field()}}
                                <div class="box-body">
                                    <div class="col-lg-6 col-lg-offset-3">

                                        <div class="form-group">
                                            <label>Select Product</label>
                                            {{--<select  name="categories[]" class="form-control select2 select2-hidden-accessible"  style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
                                            <select name="name" class="form-control" >
                                                <option selected disabled>Select a Product</option>
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
                                @if($invoiceProducts)
                                    @foreach($invoiceProducts as $invoiceProduct)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$invoiceProduct->name}}</td>
                                            <td>{{$invoiceProduct->quantity}}</td>
                                            <td>{{$invoiceProduct->price}}</td>
                                            <td>N {{$invoiceProduct->total}}</td>
                                            <td><a href="{{route('invoiceProduct.edit', $invoiceProduct->id)}}"><span class="fa fa-edit"></span></a></td>
                                            <td>
                                                <form method="post" id="delete-form-{{$invoiceProduct->id}}" action="{{route('invoiceProduct.destroy', $invoiceProduct->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$invoiceProduct->id}}').submit();}
                                                        else
                                                        {event.preventDefault();}">
                                                    <span class="fa fa-trash" style="color: red"></span>
                                                </a>
                                            </td>
                                            <td>{{$invoiceProduct->created_at->diffForHumans()}}</td>
                                            <td>{{$invoiceProduct->updated_at->diffForHumans()}}</td>

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

