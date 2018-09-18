@extends('admin.layouts.app')


@section('content')


    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Update Role</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('role.update', $role->id)}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name"> Role Name</label>
                                        <input type="text" value="{{$role->name}}"  class="form-control" name="name" id="name" placeholder="Enter  tag name">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="name">Post Permissions</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'product')
                                                    <div class="checkbox">
                                                        <label for=""><input type="checkbox" name="permission[]" value="{{$permission->id}}"

                                                             @foreach($role->permissions as $rolPer)

                                                                 @if($rolPer->id == $permission->id)
                                                                     {{'checked'}}
                                                                 @endif

                                                             @endforeach

                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="col-lg-4">
                                            <label for="name">Users Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'user')
                                                    <div class="checkbox">
                                                        <label for=""><input type="checkbox" name="permission[]" value="{{$permission->id}}"

                                                            @foreach($role->permissions as $rolPer)

                                                                @if($rolPer->id == $permission->id)
                                                                    {{'checked'}}
                                                                @endif

                                                            @endforeach

                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="col-lg-4">
                                            <label for="name">Other Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'other')
                                                    <div class="checkbox">
                                                        <label for=""><input type="checkbox" name="permission[]" value="{{$permission->id}}"

                                                            @foreach($role->permissions as $rolPer)

                                                                @if($rolPer->id == $permission->id)
                                                                    checked
                                                                @endif

                                                            @endforeach
                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{route('role.index')}}" class="btn btn-danger">Back</a>
                                    </div>
                                </div>

                            </div>



                        </form>
                        @include('includes.form_error')
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