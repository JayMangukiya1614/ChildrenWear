@extends('Frontend.Main.Master')
<style>
    .num-block.skin-5 {}

    .skin-5 .num-in {
        width: 88px;
        float: left;
        vertical-align: middle;
        position: relative;
        border: 1px solid #EEEFF1;
        border-radius: 3px;
    }

    .skin-5 .num-in:hover {
        border: 1px solid #4687FF;
        -webkit-box-shadow: 0px 0px 7px 0px rgba(70, 135, 255, 0.75);
        -moz-box-shadow: 0px 0px 7px 0px rgba(70, 135, 255, 0.75);
        box-shadow: 0px 0px 7px 0px rgba(70, 135, 255, 0.75);
    }

    .skin-5 .num-in span {
        font-size: 16px;
        width: 20px;
        display: block;
        line-height: 41px;
    }

    .skin-5 .num-in span.minus {
        float: left;
        text-align: right;
    }

    .skin-5 .num-in input {
        border: none;
        height: 41px;
        width: 46px;
        float: left;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }

    .skin-5 .num-in span.plus {
        float: right;
        text-align: left;
    }

    .in-stock-box {
        background: #ff0000;
        font-size: 12px;
        text-align: center;
        border-radius: 25px;
        padding: 4px 15px;
        display: inline-block;
        color: #fff;
    }
</style>

@section('FrontAdmin')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->



    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Stock</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                            $selling = null;
                            $prize = null;
                            $quantity = null;
                            $total = null;
                            $subtotal = null;
                            $gst = null;
                            $final = null;
                            $stock = null;

                        @endphp
                        @foreach ($cartitem as $key => $cartitem)
                            <tr>
                                <td class="align-middle"><img
                                        src="{{ asset('ProductImages/' . $cartitem->products->productimage) }}"
                                        style="width: 50px;">
                                    {{ $cartitem->products->productname }}
                                </td>
                                <td class="align-middle"> ₹<span id="selling"
                                        class="ml-2">{{ $cartitem->products->price }}</span></td>
                                <td class="align-middle">{{ $cartitem->products->discount }} %</td>

                                <td style="height: 80px"
                                    class="align-middle d-flex justify-content-center align-items-center ">
                                    <div class="num-block skin-4">
                                        <div class="num-block skin-5">
                                            <div class="num-in">
                                                <span class="minus dis"><a
                                                        href="{{ route('quantityminus', $cartitem->id) }}">-</a></span>
                                                <span class="plus"> <a
                                                        href="{{ route('quantityadd', $cartitem->id) }}">+</a></span>
                                                <input type="text" class="in-num" value="{{ $cartitem->quantity }}"
                                                    readonly="">

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @if ($cartitem->products->stock != 1)
                                    @php
                                        $stock = 2;

                                    @endphp
                                @endif
                                @php
                                    $prize = $cartitem->products->price;
                                    $dis = $cartitem->products->discount;
                                    $qty = $cartitem->quantity;
                                    $total = $prize * $qty - ($prize * $qty * $dis) / 100;
                                    $subtotal = $subtotal + $total;
                                    $gst = (5 * $subtotal) / 100;
                                    $final = $gst + $subtotal;
                                @endphp

                                <td class="align-middle" id="">₹{{ $total }}</td>

                                @if ($cartitem->products->stock != 1)
                                    <td width="15%"><span class="in-stock-box  mt-3">Out Of Stock</span></td>
                                @else
                                    <td width="15%"><span class="in-stock-box mt-3">In Stock</span></td>
                                @endif

                                <td class="align-middle "><a href="{{ route('Delete-Product-Cart', $cartitem->id) }}"
                                        class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">

                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 id="subtotal" class="font-weight-medium">₹{{ $subtotal }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">(free)</h6>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">I.G.S.T <span>(5%)</span></h6>
                            <h6 id="sgst" class="font-weight-medium"></h6>₹{{ round($gst, 2) }}
                        </div>

                    </div>


                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">₹{{ round($final, 2) }}</h5>
                        </div>
                        @if ($stock == 2)

                        <a href="" class="btn btn-block btn-primary my-3 py-3 " >Please Remove To Out Of Stock Item</a>
                        @else
                        <a href="{{ route('Fcheckout') }}" class="btn btn-block btn-primary my-3 py-3 disabled-link" >Proceed To
                            Checkout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <script>
        @if (Session::has('DeleteItem'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('DeleteItem') }}");
        @endif
        @if (Session::has('Quantity'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('Quantity') }}");
        @endif
    </script>
@endsection
