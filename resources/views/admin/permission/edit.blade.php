@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Text Editors
                <small>Advanced form element</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Add a Permission</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="col-lg-6 col-lg-offset-3">
                            @include('includes.form_error')
                        </div>
                        <form role="form" method="post" action="{{route('permission.update', $permission->id)}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name"> Permission</label>
                                        <input type="text" class="form-control" value="{{$permission->name}}" name="name" id="name" placeholder="Enter  permission">
                                    </div>
                                    <div class="form-group">

                                        <label for="for">Permission For</label>
                                        <select  class="form-control" name="for" id="for">

                                            <option selected disabled>Select Permission for</option>
                                            <option value="user">User</option>
                                            <option value="product">Product</option>
                                            <option value="other">Other</option>

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{route('permission.index')}}" class="btn btn-danger">Back</a>
                                    </div>
                                </div>

                            </div>



                        </form>

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



@endsection


@endsection