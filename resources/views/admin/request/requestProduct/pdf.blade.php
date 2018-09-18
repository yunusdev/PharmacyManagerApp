<html>

<head>

    {{--<link rel="stylesheet" href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css">--}}

    <style>

        tr{

            background-color: #2ac7a3;

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

<h1>Making a Supply Request</h1>

<div class=" col-lg-4 col-lg-offset-4" style="background-color: #2ac7a3; color: white; font-weight: bold; border-radius: 10%; width: 400px; padding: 20px;margin: 50px;">

    <p>Receipt No: {{$request->request_no}}</p>
    <p>Client Name: {{$request->supplier->name}}</p>
    <p>Client Address: {{$request->supplier->address}}</p>
    <p>Client Email: {{$request->supplier->email}}</p>
    <p>Date Expecting the goods: {{$request->day}}</p>

</div>

<table id="example1" class="table table-bordered table-striped" style="margin: 30px">
    <thead>
    <tr>
        <th>Id</th>
        <th> Name</th>
        <th>Quantity</th>

    </tr>
    </thead>
    <tbody>
    @if($requestProducts)
        @foreach($requestProducts as $requestProduct)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{$requestProduct->name}}</td>
                <td>{{$requestProduct->quantity}}</td>
            </tr>
        @endforeach
    @endif

    </tbody>

</table>



</body>

</html>