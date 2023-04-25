@extends('Frontend.Main.Master')

<title>Delivered Order</title>

@section('FrontAdmin')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Order Table</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>

                <p class="m-0"> Delivered Order Table</p>

            </div>
        </div>
    </div>
    <!-- Page Header End -->
    @if (count($data) > 0)
        <div class="table-responsive">

            <table class="table table-striped">


                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">image</th>
                        <th scope="col">Order_Id</th>
                        <th scope="col">price</th>
                        <th scope="col">discount</th>
                        <th scope="col">selling</th>
                        <th scope="col">taxes</th>
                        <th scope="col">Total</th>

                        <th scope="col">Action</th>






                    </tr>
                </thead>
                <tbody>
                    @php
                        $price = null;
                        $gst = null;
                    @endphp

                    @foreach ($data as $key => $data)
                        <tr>
                            <td>{{ $data->CI_ID }}</td>
                            <td class="text-wrap"style="max-width:100px;"><img width="90px" height="90px"
                                    src="{{ !empty($data->products->productimage) ? url('ProductImages/' . $data->products->productimage) : url('images/default.jpeg') }}">
                            </td>
                            {{-- <td>{{ $data->products->discount }}</td> --}}

                            <td>{{ $data->OI_ID }}</td>
                            <td>{{ $data->products->price }} <span> ({{ $data->quantity }})</span></td>
                            <td>{{ $data->products->discount }} %</td>
                            <td>{{ $data->products->selling }}</td>
                            {{-- <td>{{ $data->products->selling }}</td> --}}
                            @php
                                $gst = $data->quantity * ((5 * $data->products->selling) / 100);
                                $price = $gst + $data->products->selling * $data->quantity;

                            @endphp
                            <td>{{ round($gst, 2) }}</td>
                            <td>{{ round($price, 2) }}</td>

                            <td><button type="button" onclick="showModel(this)"  id="{{ $data->id }}"><i
                                class="fa-brands fa-readme"></i></i></button>


                            </td>
                        </tr>

                    @endforeach


                </tbody>
            </table>
        @else
            <table class="table table-striped">


                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">image</th>
                        <th scope="col">Order_Id</th>
                        <th scope="col">price</th>
                        <th scope="col">discount</th>
                        <th></th>
                        <th scope="col">selling</th>
                        <th scope="col">taxes</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>






                    </tr>
                </thead>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> Data Not Found...</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>
    @endif


    </div>
    <script>
        @if (Session::has('Confirm'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('Confirm') }}");
        @endif
    </script>
@endsection
