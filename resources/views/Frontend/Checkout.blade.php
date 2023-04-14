@extends('Frontend.Main.Master')

<title>Checkout</title>

@section('FrontAdmin')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->



    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <form action="{{ route('Address-Save', $data->id) }}" method="POST">
                        @csrf
                        <h4 class="font-weight-semi-bold mb-4">Billing Address</h4> <input type="text" readonly
                            class=" mb-3  form-control" name="CI_ID" value="{{ $data->CI_ID }}">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" value="{{ $data->FirstName }}" name="FirstName" type="text"
                                    placeholder="John">
                                <span class="text-danger">
                                    @error('FirstName')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" value="{{ $data->LastName }}" name="LastName" type="text"
                                    placeholder="Doe">
                                <span class="text-danger">
                                    @error('LastName')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" readonly type="text" value="{{ $data->Email }}" name="Email"
                                    placeholder="example@email.com">
                                <span class="text-danger">
                                    @error('Email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" value="{{ $data->PhoneNo }}" name="PhoneNo"
                                    placeholder="+123 456 789">
                                <span class="text-danger">
                                    @error('PhoneNo')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Address Line 1</label>
                                <textarea name="Address" class="form-control" id="" cols="10" rows="2">{{ $data->Address }}</textarea>
                                <span class="text-danger">
                                    @error('Address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" name="State" value="{{ $data->State }}">
                                <span class="text-danger">
                                    @error('State')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            {{-- <div class="col-md-6">
                                <label class="labels mt-3">Education</label>
                                <select name="education" value="{{ old('education') }}" class="form-control "
                                    id="">
                                    <option {{ $data->education == 'Undergraduate' ? 'selected' : '' }}
                                        value="Undergraduate">Undergraduate</option>
                                    <option {{ $data->education == 'Postgraduate' ? 'selected' : '' }}
                                        value="Postgraduate">Postgraduate</option>

                                </select>
                                <span class="text-danger">
                                    @error('education')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div> --}}
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" name="City" value="{{ $data->City }}">
                                <span class="text-danger">
                                    @error('City')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" id="zip" type="text" name="ZipCode"
                                    value="{{ $data->ZipCode }}">
                                <span class="text-danger">
                                    @error('ZipCode')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 form-group ">

                                {{-- <button class="btn btn-outline-info float-right" style="margin-top:2rem;"
                                    type="submit">Update</button> --}}
                            </div>


                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mt-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    @php
                        $subtotal = null;
                        $gst = null;
                        $final = null;
                        $price = null;

                    @endphp
                    @foreach ($productid as $productid)
                        <div class="d-flex justify-content-between">
                            <p>{{ $productid->products->productname }} <span class="text-danger"> Qty .
                                    {{ $productid->quantity }} </span></p>
                            <p>₹{{ $price = $productid->products->selling * $productid->quantity }}</p>
                            @php

                                $subtotal = $subtotal + $price;
                                $gst = (5 * $subtotal) / 100;
                                $final =  $gst + $subtotal;

                            @endphp
                        </div>
                    @endforeach

                    <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">₹ <span></span>{{ $subtotal }}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">Free</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">I.G.S.T</h6>
                        <h6 class="font-weight-medium">₹{{ round($gst, 2) }}</h6>
                    </div>

                    <div class="d-flex justify-content-between mt-2 mb-0 ">
                        <h6 class="font-weight-medium">Payment Type</h6>
                        <h6 class="font-weight-medium">COD</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold" > ₹ <span></span>{{ round($final , 2)}}</h5>
                    </div>
                </div>
            </div>
            <div class="card-footer border-secondary bg-transparent">
                <button id="porder"
                    class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
            </div>
        </div>
    </form>

    </div>
    </div>
@endsection
