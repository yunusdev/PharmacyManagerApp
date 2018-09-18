

@extends('admin.layouts.app')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                403 Error Page
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 style="margin-top: -10px" class="headline text-yellow"> 403</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! You arent authorized.</h3>

                    <p>
                        Please kindly contact the SuperAdministrator for more information. Thanks.
                        Meanwhile, you may <a href="{{route('admin.home')}}">return to dashboard</a>.
                    </p>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
@endsection






