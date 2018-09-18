@extends('admin.layouts.app')


@section('content')


@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Admins</h3>
{{--                    @can('admin.create', auth('admin')->user())--}}
                        <a style="padding: 10px" href="{{route('admins.create')}}"  CLASS="col-lg-offset-5 btn btn-success">
                            <i class="fa fa-user-plus" style="padding-right: 10px"></i>Add New Admin
                        </a>
                    {{--@endcan--}}
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
                                    <th>DP</th>
                                    <th>Admin Name</th>
                                    <th>Status</th>
                                    <th>Assigned Roles</th>
                                    @can('admin.update', auth('admin')->user())

                                    <th>Edit</th>

                                    @endcan
                                    @can('admin.delete', auth('admin')->user())

                                    <th>Delete</th>

                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @if($admins)
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$admin->id}}</td>
                                            <td><img  height="30" width="30" src="/AdminProfilePic/{{$admin->photo ? $admin->photo->path : "No photo"}}" alt=""></td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->status == 1 ? 'Active': 'Not Active' }}</td>
                                            <td>
                                                @foreach($admin->roles as $adrole)

                                                    {{$adrole->name}} |

                                                @endforeach
                                            </td>
                                            @can('admin.update', auth('admin')->user())

                                            <td><a href="{{route('admins.edit', $admin->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>

                                            @endcan
                                            @can('admin.delete', auth('admin')->user())
                                            <td>

                                                <form method="post" id="delete-form-{{$admin->id}}" action="{{route('admins.destroy', $admin->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$admin->id}}').submit();}
                                                        else
                                                        {event.preventDefault();}">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>DP</th>
                                    <th>Admin Name</th>
                                    <th>Status</th>
                                    <th>Assigned Roles</th>
                                     @can('admin.update', auth('admin')->user())

                                    <th>Edit</th>

                                    @endcan
                                    @can('admin.delete', auth('admin')->user())

                                    <th>Delete</th>

                                    @endcan

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
//            $('#example2').DataTable({
//                'paging'      : true,
//                'lengthChange': false,
//                'searching'   : false,
//                'ordering'    : true,
//                'info'        : true,
//                'autoWidth'   : false
//            })
        })
    </script>

@endsection