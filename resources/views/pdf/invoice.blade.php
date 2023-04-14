<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> Bill</title>

    <style>
        body {
            background: #eee;
            margin-top: 20px;
        }

        .text-danger strong {
            color: #9f181c;
        }

        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }

        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }

        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }

        .receipt-main thead th {
            color: #fff;
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }

        .receipt-right p i {
            text-align: center;
            width: 18px;
        }

        .receipt-main td {
            padding: 9px 20px !important;
        }

        .receipt-main th {
            padding: 13px 20px !important;
        }

        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }

        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }

        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        #container {
            background-color: #dcdcdc;
        }
    </style>

</head>

<body>
    <div class="col-md-12">
        <div class="row">

            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                <h5>BabyHub</h5>
                                <p>+911234567890<i class="fa fa-phone"></i></p>
                                <p>babyhub007@gmail.com <i class="fa fa-envelope-o"></i></p>
                                <p>India <i class="fa fa-location-arrow"></i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <h5><b>Name: </b>{{ $client->FirstName }} {{ $client->LastName }} </h5>
                                <p><b>Mobile :</b> {{ $client->PhoneNo }}</p>
                                <p><b>Email :</b> {{ $client->Email }} </p>
                                <p><b>Address :</b> {{ $client->Address }} </p>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h4>Invoice No. {{ $data->OI_ID }}</h4>
                            </div>
                        </div>

                        
                    </div>
                </div>
                @php
                    $a = null;
                    $gst = null;
                    $total = null;
                @endphp
                @php
                    $a = $data->products->selling * $data->quantity;
                    $gst = ($a * 5) / 100;
                    $total = $gst + $a;
                @endphp
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-9">{{ $data->products->productname }}</td>
                                <td class="col-md-3"><i class="fa fa-inr"> {{ $data->products->price }} /-</td>
                            </tr>

                            <tr>
                                <td class="text-right">
                                    <p>
                                        <strong>Quantity: </strong>
                                    </p>
                                    <p>
                                        <strong>Discount: </strong>
                                    </p>
                                    <p>
                                        <strong>Total Amount: </strong>
                                    </p>
                                    <p>
                                        <strong>IGST(5%): </strong>
                                    </p>
                                    <p>
                                        {{-- <strong>Payable Amount: </strong>
                                    </p> --}}
                                </td>

                                <td>
                                    <p>
                                        <strong><i class="fa fa-inr"></i> {{ $data->quantity }} </strong>
                                    </p>
                                    <p>
                                        <strong><i class="fa fa-inr"></i> {{ $data->products->discount }}%</strong>
                                    </p>
                                    <p>
                                        <strong><i class="fa fa-inr"></i> {{ $a }} </strong>
                                    </p>
                                    <p>

                                        <strong><i class="fa fa-inr"></i>{{ $gst }}</strong>
                                    </p>
                                    {{-- <p>
                                        <strong><i class="fa fa-inr"></i> {{$total}} /-</strong>
                                    </p> --}}
                                </td>
                            </tr>
                            <tr>

                                <td class="text-right">
                                    <h2><strong>Total: </strong></h2>
                                </td>
                                <td class="text-left text-danger">
                                    <h2><strong><i class="fa fa-inr">{{ $total }}</i></strong></h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                            <div class="receipt-right">
                                <p><b>Date :</b>{{ $data->created_at }}</p>
                                <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
