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
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                            $selling = null;
                            $prize = null;
                            $quantity = null;
                            $total = null;
                            $subtotal =null;
                            $gst = null;
                            $final = null
                            
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

                                <td class="align-middle">
                                    <div class="num-block skin-4">
                                        <div class="num-block skin-5">
                                            <div class="num-in">
                                                <span class="minus dis">-</span>
                                                <input type="text" class="in-num" value="{{$cartitem->quantity}}" readonly="">
                                                <span class="plus"> <a href="">+</a> </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @php
                                    $prize = $cartitem->products->price;
                                    $dis = $cartitem->products->discount;
                                    $qty = $cartitem->quantity;
                                    $total = $prize * $qty - ($prize * $qty * $dis) / 100;
                                    $subtotal = $subtotal + $total;
                                    $gst = (9*$subtotal)/100;
                                    $final = (2*($gst))+$subtotal
                                @endphp

                                <td class="align-middle" id="total_{{ $key }}">₹{{ $total }}</td>
                                <td class="align-middle "><a href="{{ route('Delete-Product-Cart', $cartitem->id) }}"
                                        class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                {{-- <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form> --}}
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 id="subtotal" class="font-weight-medium">₹.
                                {{ !empty($subtotal)? round($subtotal,2) : '00' }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">(free)</h6>
                        </div>

                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">S.G.S.T <span>(9%)</span></h6>
                            <h6 id="sgst" class="font-weight-medium"></h6>₹{{ round($gst,2) }}
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">C.G.S.T <span>(9%)</span></h6>
                            <h6 id="cgst" class="font-weight-medium">₹{{ round($gst,2) }}</h6>
                        </div>
                    </div>


                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">₹{{ round($final,2) }}</h5>
                        </div>
                        <a href="{{route('Fcheckout')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <script>
      /////////////////// product +/-
$(document).ready(function() {
  $('.num-in span').click(function () {
      var $input = $(this).parents('.num-block').find('input.in-num');
    if($(this).hasClass('minus')) {
      var count = parseFloat($input.val()) - 1;
      count = count < 1 ? 1 : count;
      if (count < 2) {
        $(this).addClass('dis');
      }
      else {
        $(this).removeClass('dis');
      }
      $input.val(count);
    }
    else {
      var count = parseFloat($input.val()) + 1
      $input.val(count);
      if (count > 1) {
        $(this).parents('.num-block').find(('.minus')).removeClass('dis');
      }
    }
    
    $input.change();
    return false;
  });
  
});
// product +/-
        // product +/-

        // $(document).ready(function() {
        //     $('#plus').on('click', function() {
        //         var price = document.getElementById("price").innerHTML;
        //         var discount = document.getElementById("discount").innerHTML;
        //         var quantity = $('#quantity').val();
        //         var a = price * quantity;
        //         var b = (a * discount) / 100;
        //         var c = a - b;
        //         console.log(c);
        // var number = $('#number').val();

        // var price = selling * number;
        // console.log(price);
        //     })
        // });

        @if (Session::has('DeleteItem'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('DeleteItem') }}");
        @endif
    </script>
@endsection
