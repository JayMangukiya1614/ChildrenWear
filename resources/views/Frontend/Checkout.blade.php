@extends('Frontend.Main.Master')

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
                            class=" mb-3  form-control" name="CI_ID" value=" Client ID:-{{ $data->CI_ID }}">
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
                                <input class="form-control" type="text" value="{{ $data->Email }}" name="Email"
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
                                <input class="form-control" type="text" name="ZipCode" value="{{ $data->ZipCode }}" >
                                <span class="text-danger">
                                    @error('ZipCode')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 form-group ">

                                <button class="btn btn-outline-info float-right" style="margin-top:2rem;"
                                    type="submit">Update</button>
                            </div>

                    </form>

                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    @foreach ($productname as $productname)
                        <div class="d-flex justify-content-between">
                            <p>{{ $productname->productname }}</p>
                            <p>{{ $productname->selling }}</p>
                        </div>
                    @endforeach

                    <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">$160</h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Checkout End -->
@endsection
