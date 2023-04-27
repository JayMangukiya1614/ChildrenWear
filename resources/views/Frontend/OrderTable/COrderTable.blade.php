@extends('Frontend.Main.Master')

<title>Confirm Order</title>
<style>
    ul li p {
        font-weight: bold !important;
        display: contents !important;
    }
</style>
@section('FrontAdmin')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Order Table</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>

                <p class="m-0"> Confirm Order Table</p>

            </div>
        </div>
    </div>
    <!-- Page Header End -->
    @if (count($data) > 0)
        <div class="table-responsive">

            <table class="table table-striped">


                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
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
                            <td class="text-wrap"style="max-width:100px;"><img width="90px" height="90px"
                                    src="{{ !empty($data->products->productimage) ? url('ProductImages/' . $data->products->productimage) : url('images/default.jpeg') }}">
                            </td>
                            <td>{{ $name->FirstName }}&nbsp &nbsp {{ $name->LastName }}</td>
                            <td>{{ $data->OI_ID }}</td>
                            <td>{{ $data->products->price }} <span> ({{ $data->quantity }})</span></td>
                            <td>{{ $data->products->discount }} %</td>
                            <td>{{ $data->products->selling }}</td>
                            @php
                                $gst = $data->quantity * ((5 * $data->products->selling) / 100);
                                $price = $gst + $data->products->selling * $data->quantity;

                            @endphp
                            <td>{{ round($gst, 2) }}</td>
                            <td>{{ round($price, 2) }}</td>

                            <td><button type="button" onclick="showModel(this)" id="{{ $data->id }}"><i
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

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Details of product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <img alt="Image not found" width="100%" class="rounded" id="modelImage">
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <ul>
                                    <li class="mt-1">
                                        <p> Product Name:-</p>
                                        <span class="d-inline-block" id="productTitle"></span>
                                    </li>

                                    <li class="mt-1">
                                        <p> Product Color:-</p>
                                        <span class="d-inline-block" id="productColor"></span>
                                    </li>
                                    <li class="mt-1">
                                        <p>Product Size:-</p>
                                        <span class="d-inline-block" id="productSize"></span>
                                    </li>
                                    <li class="mt-1">
                                        <p> Age:-</p>
                                        <span class="d-inline-block" id="productAge"></span>
                                    </li>

                                    <li class="mt-1">
                                        <p> Description :-</p>
                                        <span class="d-inline-block" id="productDescription"></span>
                                    </li>

                                    <li class="mt-1">
                                        <p> Long Description :-</p>
                                        <span class="d-inline-block" id="productLdescription"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModel(data) {
            // console.log(data);
            // $("#modal").modal("toggle");

            $.ajax({
                type: 'GET',
                url: `/client-Order-Details/${data.id}`,
                data: {

                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {

                    $('#modelImage').attr('src',
                        `http://127.0.0.1:8000/ProductImages/${response.productdata['productimage']}`);

                    $('#productTitle').text(response.productdata['productname']);
                    $('#productColor').text(response.orderdata['color']);
                    $('#productSize').text(response.orderdata['size']);
                    $('#productAge').text(response.orderdata['age']);
                    $('#productDescription').text(response.productdata['description']);
                    $('#productLdescription').text(response.productdata['Ldescription']);

                    $("#modal").modal("toggle");
                }
            })
        }
    </script>
@endsection
