@extends('admin.layouts.app')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="row">
                    <div class="col-md-12 col-xs-12">


                        <h1 style="margin: 30px"> Home Page</h1>

                        <div class="col-md-4 col-xs-12">

                            <div class="small-box bg-yellow ">
                                <div class="inner">
                                    <h3>
                                        @if($suppliers)
                                            {{$suppliers->count()}}
                                        @endif
                                    </h3>
                                    <h2><strong>Suppliers</strong></h2>

                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{route('supplier.create')}}" class="small-box-footer">
                                    Add a Supplier<i style="margin-left: 5px"  class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        @if($clients)
                                            {{$clients->count()}}
                                        @endif
                                    </h3>
                                    <h2><strong> Clients</strong></h2>

                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{route('client.create')}}" class="small-box-footer">
                                    Add Client <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>

                            <!--/.box -->
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    @if($products)
                                        <h3>{{$products->count()}}<sup style="font-size: 20px"></sup></h3>
                                    @endif

                                        <h2><strong> Products</strong></h2>

                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{route('product.create')}}" class="small-box-footer">Add a Product<i style="margin-left: 5px" class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <a href="{{route('receipt.create')}}" >
                            <div class="small-box bg-green" style="padding-top: 25px; padding-bottom: 40px">
                                <div class="inner">

                                    <h2><strong> Create Receipt</strong></h2>

                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                {{--<a href="{{rout}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                            </div>
                            </a>

                        </div>
                        <div class="col-md-4 col-xs-12">

                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                                <div class="info-box-content">
                                    <h2><span class="info-box-text"> Total Sales</span></h2>
                                    <span class="info-box-number">N{{$totalSale}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                                <div class="info-box-content">
                                    <h2><span class="info-box-text"> Total Purchases</span></h2>
                                    <span class="info-box-number">N{{$purchaseTotal}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>

                        </div>


                        <!-- /.box-body -->

                <!-- /.box-footer-->
                    </div>
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection