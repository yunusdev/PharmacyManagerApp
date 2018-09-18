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


                            <div class="col-lg-6 col-lg-offset-3" style="background-color: skyblue; color: white">

                                <img  height="800" width="400" src="/ReceivePics/{{$receive->photo ? $receive->photo->path : "No photo"}}" alt="">

                                <h1>{{$receive->supplier->name}}</h1>
                                <h2>{{$receive->document_number}}</h2>

                                {!! htmlspecialchars_decode($receive->description) !!}

                            </div>

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



@endsection


@endsection

