<html>

    <head>

        {{--<link rel="stylesheet" href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css">--}}

        <style>

            tr{

                background-color: #c74e92;

            }

            td{

                color: white;
                padding: 20px;

            }
            th{

                            color: black;
                            padding: 20px;

                        }

        </style>

    </head>

    <body>

    <img src="ProductPic/1520097436FINS.jpg"  height="50"  width="50" alt="">Logo

    <h1>Receipt</h1>

    <div class=" col-lg-4 col-lg-offset-4" style="background-color: #c74e92; color: white; font-weight: bold; border-radius: 10%; width: 400px; padding: 20px;margin: 50px;">

        <p>Receipt No: {{$receipt->receipt_no}}</p>
        <p>Client Name: {{$receipt->client_name}}</p>
        <p style="">Total: N{{$receipt->sub_total}}</p>

    </div>

    <table id="example1" class="table table-bordered table-striped" style="margin: 30px">
        <thead>
        <tr>
            <th>Id</th>
            <th> Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>

        </tr>
        </thead>
        <tbody>
        @if($receiptProducts)
            @foreach($receiptProducts as $receiptProduct)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{$receiptProduct->name}}</td>
                    <td>{{$receiptProduct->quantity}}</td>
                    <td>{{$receiptProduct->price}}</td>
                    <td>N {{$receiptProduct->total}}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td></td>
            <th>Total Sum: </th>
            <td></td>
            <td></td>
            <th>N{{$SumAll}}</th>
        </tr>
        </tbody>

    </table>



    </body>

</html>