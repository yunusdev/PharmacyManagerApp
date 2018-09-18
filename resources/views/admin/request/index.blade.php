@extends('admin.layouts.app')


@section('content')

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection



<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Supply Management</h3>
                <a href="{{route('request.create')}}" CLASS="col-lg-offset-5 btn btn-success">Add New Request</a>
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
                                <th>Request No</th>
                                <th>Supplier Name</th>
                                <th>Day Expected</th>
                                <th>Created At</th>
                                <th>Add product</th>

                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($requests)
                                @foreach($requests as $request)
                                    <tr>
                                        <td>{{$request->id}}</td>
                                        <td><a href="{{route('requestProduct.index', $request->id)}}">{{$request->request_no}}</a></td>
                                        <td>{{$request->supplier->name}}</td>
                                        <td>{{$request->day}}</td>
                                        <td>{{$request->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route('requestProduct.index', $request->id)}}"><span class="fa fa-plus-square" style="color: #aaff0f;font-size: 20px"></span></a></td>

                                        <td><a href="{{route('request.edit', $request->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>

                                        <td>

                                            <form method="post" id="delete-form-{{$request->id}}" action="{{route('request.destroy', $request->id)}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                            </form>

                                            <a href="" onclick="
                                                    if(confirm('Are you sure you want to delete this ?'))
                                                    {
                                                    event.preventDefault();document.getElementById('delete-form-{{$request->id}}').submit();}
                                                    else
                                                    {event.preventDefault();}">
                                                <span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Request No</th>
                                <th>Supplier Name</th>
                                <th>Day Expected</th>
                                <th>Created At</th>
                                <th>Add product</th>

                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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



@endsection

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
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

@endsection
