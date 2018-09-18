@extends('admin.layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')




    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Purchase</h3>
                    <a href="{{route('purchase.create')}}" CLASS="col-lg-offset-5 btn btn-warning">Add New Purchase</a>
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
                                    <th>No</th>
                                    <th>Seller</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Date of Purchase</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($purchases)
                                    @foreach($purchases as $purchase)
                                        <tr>
                                            <td>{{$purchase->id}}</td>
                                            <td>{{$purchase->seller}}</td>
                                            <td>N{{$purchase->price}}</td>
                                            <td>{{$purchase->description}}</td>
                                            <td>{{$purchase->date}}</td>
                                            <td><a href="{{route('purchase.edit', $purchase->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>

                                            <td>

                                                <form method="post" id="delete-form-{{$purchase->id}}" action="{{route('purchase.destroy', $purchase->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$purchase->id}}').submit();}
                                                        else
                                                        {event.preventDefault();}">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th>N{{$sumAll}}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Seller</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Date of Purchase</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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

