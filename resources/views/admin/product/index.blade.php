@extends('admin.layouts.app')


@section('styles')

    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Admins</h3>
{{--                    @can('medicine.create', auth()->user())--}}

                    <a style="padding: 10px" href="{{route('product.create')}}"  CLASS="col-lg-offset-5 btn btn-success">
                            <i class="fa fa-user-plus" style="padding-right: 10px"></i>Add New Product
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
                                    <th>Pic</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Increment Quantity</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>Unit</th>
                                    <th>Detail</th>
                                    {{--                                    @can('medicine.update', auth('admin')->user())--}}

                                    <th>Edit</th>

                                    {{--@endcan--}}
                                    {{--                                    @can('medicine.delete', auth('admin')->user())--}}

                                    <th>Delete</th>

                                    {{--@endcan--}}
                                </tr>
                                </thead>
                                <tbody>
                                @if($products)
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            {{--<td></td>--}}
                                            <td><img  height="30" width="30" src="/ProductPic/{{$product->photo ? $product->photo->path : "No photo"}}" alt=""></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td><a href="{{route('quantity.add', $product->id)}}"><span class="fa fa-plus-square" style="color: #aaff0f;font-size: 20px"></span></a></td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->expiry_date}}</td>
                                            <td>{{$product->unit}}</td>
                                            <td>{{$product->detail}}</td>

                                            {{--                                            @can('product.update', auth('admin')->user())--}}


                                            <td><a href="{{route('product.edit', $product->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                            {{--@endcan--}}
                                            {{--                                            @can('product.delete', auth('admin')->user())--}}

                                            <td>

                                                <form method="post" id="delete-form-{{$product->id}}" action="{{route('product.destroy', $product->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                </form>

                                                <a href="" onclick="
                                                        if(confirm('Are you sure you want to delete this ?'))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{$product->id}}').submit();}
                                                        else
                                                        {event.preventDefault();}">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
                                            </td>
                                            {{--@endcan--}}
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Pic</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Increment Quantity</th>

                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>Unit</th>
                                    <th>Detail</th>
                                    {{--                                    @can('medicine.update', auth('admin')->user())--}}

                                    <th>Edit</th>

                                    {{--@endcan--}}
                                    {{--                                    @can('medicine.delete', auth('admin')->user())--}}

                                    <th>Delete</th>

                                    {{--@endcan--}}
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

        })
    </script>

@endsection

