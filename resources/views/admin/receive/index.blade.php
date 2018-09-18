@extends('admin.layouts.app')

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')




    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Users Issue</h3>

                    <a style="padding: 10px" href="{{route('receive.create')}}"  CLASS="col-lg-offset-5 btn btn-success">
                        <i class="fa fa-user-plus" style="padding-right: 10px"></i>Add New Document
                    </a>
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
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Supplier Name</th>
                                    <th>Document</th>
                                    <th>Doc No</th>
                                    {{--<th>Description</th>--}}
                                    <th>Time</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($receives)
                                    @foreach($receives as $receive)
                                        <tr>
                                            <td>{{$receive->id}}</td>
                                            <td>{{$receive->supplier->name}}</td>
                                            <td><a href="{{route('receive.show', $receive->id)}}"><img  height="30" width="30" src="/ReceivePics/{{$receive->photo ? $receive->photo->path : "No photo"}}" alt=""></a></td>
                                            <td>{{$receive->document_number ? $receive->document_number : 'No Doc No'}}</td>
                                            {{--<td>--}}
                                                {{--@if($receive->description)--}}

                                                {{--{!! htmlspecialchars_decode($receive->description) !!}--}}

                                                {{--@else 'No Description' @endif--}}
                                            {{--</td>--}}

                                            <td>{{$receive->created_at->diffForHumans()}}</td>
                                            <td>

                                                <form method="post" id="delete-form-{{$receive->id}}" action="{{route('contact.destroy', $receive->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$receive->id}}').submit();}
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
                                    <th>Supplier Name</th>
                                    <th>Document</th>
                                    <th>Doc No</th>
                                    {{--<th>Description</th>--}}
                                    <th>Time</th>
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

