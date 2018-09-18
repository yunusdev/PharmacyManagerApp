@extends('admin.layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')




    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sales</h3>
                    <a href="{{route('receipt.create')}}" CLASS="col-lg-offset-5 btn btn-warning">Create a Receipt </a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            @include('includes.form_error')
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body adScroll">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Receipt No</th>
                                    <th>Client Name</th>
                                    <th>Sub Total</th>
                                    <th>Add product</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($receipts)
                                    @foreach($receipts as $receipt)
                                        <tr>
                                            <td>{{$receipt->id}}</td>
                                            <td><a href="{{route('receiptProduct.index', $receipt->id)}}">{{$receipt->receipt_no}}</a></td>
                                            <td>{{$receipt->client_name}}</td>
                                            <td>N{{$receipt->sub_total == 0 ? 'o Product Added Yet' : $receipt->sub_total}}</td>
                                            <td><a href="{{route('receipt.edit', $receipt->id)}}"><span class="fa fa-edit"></span></a></td>
                                            <td><a href="{{route('receiptProduct.index', $receipt->id)}}"><span class="fa fa-plus-square" style="color: #aaff0f;font-size: 20px"></span></a></td>

                                            <td>
                                                <form method="post" id="delete-form-{{$receipt->id}}" action="{{route('receipt.destroy', $receipt->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$receipt->id}}').submit();}
                                                        else
                                                        {event.preventDefault();}">
                                                    <span class="fa fa-trash" style="color: red"></span>
                                                </a>
                                            </td>
                                            <td>{{$receipt->created_at->diffForHumans()}}</td>
                                            <td>{{$receipt->updated_at->diffForHumans()}}</td>

                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td></td>
                                    <td>Total Sales: </td>
                                    <td></td>
                                    <td style="font-weight: bold">N{{ $totalAll }}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Receipt No</th>
                                    <th>Client Name</th>
                                    <th>Sub Total</th>
                                    <th>Add product</th>

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

