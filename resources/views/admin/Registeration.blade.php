@extends('layouts/contentNavbarLayout')
<style>
    body {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .image {
        width: 200px !important;
        height: 200px;
    }

   
</style>

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection



@section('content')



    <div class="container border rounded-2 shadow-lg bg-white mb-2 form-group mt-3 p-4 mb-3">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-shadow: 2px 2px #EDF1FF;" class="text-center text-dark  shadow-lg bg-white p-4 border">
                    Baby Hub Admin Registration </h3>
            </div>
        </div>
        <form action="{{ route('Admin-Reg-Save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="AD_ID" style="display: none">
            <div class="row ">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        <label for="file-input">
                            <img id="previewImg" class="image rounded-circle" src="{{ asset('images/default.jpeg') }}" />
                        </label>

                        <input id="file-input" name="profileimage" type="file" onchange="previewFile(this);"
                            style="display: none;" />
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">

                        
                        <div class="col-md-4">
                            <label class="mt-5" for="First_Name">First Name</label>
                            <input name="firstname" value="{{ old('firstname') }}" id="First_Name"
                                class="form-control shadow-lg bg-white" type="text">
                            <span class="text-danger">
                                @error('firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="mt-5" for="Middle_Name">Middle Name</label>
                            <input name="middlename" value="{{ old('middlename') }}" id="Middle_Name"type="text"
                                class="shadow-lg bg-white form-control">

                            {{-- <input name="middlename  "id="Middle_Name" type="text"
                            class="shadow-lg bg-white form-control"> --}}
                            <span class="text-danger">
                                @error('middlename')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Last_Name">Last Name</label>
                            <input name="lastname" value="{{ old('lastname') }}" id="Last_Name"type="text"
                                class="shadow-lg bg-white form-control">
                            <span class="text-danger">
                                @error('lastname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="sn">Shop Name</label>
                            <input name="shopname" value="{{ old('shopname') }}" id="sn"
                                class="form-control shadow-lg bg-white" type="text">
                            <span class="text-danger">
                                @error('shopname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="pincode">Pincode</label>
                            <input name="pincode" value="{{ old('pincode') }}" id="pincode"
                                class="form-control shadow-lg bg-white" type="number">
                            <span class="text-danger">
                                @error('pincode')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mt-4" for="">Education</label>
                            <select name="education" value="{{ old('education') }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option selected value="Undergraduate">Undergraduate</option>
                                <option value="Postgraduate">Postgraduate</option>

                            </select>
                            <span class="text-danger">
                                @error('education')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="">Gender</label>
                            <select name="gender" value="{{ old('gender') }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="text-danger">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="state">State</label>
                            <select name="state" value="{{ old('state') }}"
                                class="form-control  shadow-lg bg-white rounded-3" name="state" id="">
                                <option selected value="Goa">Goa</option>
                                <option value="Gujrat">Gujrat</option>
                                <option value="Kerala">Kerala</option>
                            </select>
                            <span class="text-danger">
                                @error('state')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="City">City</label>
                            <select name="city" value="{{ old('city') }}"
                                class="form-control  shadow-lg bg-white rounded-3" id="city">
                                <option selected value="Delhi">Delhi</option>
                                <option value="Bombay">Bombay</option>
                                <option value="Banglore">Banglore</option>
                            </select>
                            <span class="text-danger">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="MN">Mobile Nomber</label>
                            <input name="mobilenumber" value="{{ old('mobilenumber') }}" id="MN"
                                class="form-control shadow-lg bg-white" type="number">
                            <span class="text-danger">
                                @error('mobilenumber')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="GSTNO">GST NO.</label>
                            <input name="gstno" value="{{ old('gstno') }}" id="GSTNO"
                                class="form-control shadow-lg bg-white" type="text">
                            <span class="text-danger">
                                @error('gstno')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="mt-5" for="Bank_Name">Bank Name:</label>
                            <input name="bankname" value="{{ old('bankname') }}" id="Bank_Name"
                                class="form-control shadow-lg bg-white" type="text">
                            <span class="text-danger">
                                @error('bankname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Branch_Name">Branch Name</label>
                            <input name="branchname" id="Branch_Name" type="text" value="{{ old('branchname') }}"
                                class="shadow-lg bg-white form-control">
                            <span class="text-danger">
                                @error('branchname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="IFSC_Code">IFSC Code</label>
                            <input name="ifsccode" id="IFSC_Code" type="text" value="{{ old('ifsccode') }}"
                                class="shadow-lg bg-white form-control">
                            <span class="text-danger">
                                @error('ifsccode')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="E_mail">E_mail</label>
                            <input name="email" id="E_mail" class="form-control shadow-lg bg-white"
                                value="{{ old('email') }}" type="email">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="Passwo">Password</label>
                            <input name="password" id="Passwo" class="form-control shadow-lg bg-white"
                                value="{{ old('password') }}" type="password">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-5" for="Address">Address</label>
                            <textarea name="address" id="Address" class="form-control shadow-lg bg-white rounded-3" type="text">{{ old('address') }}</textarea>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-6">
                            <label class="mt-5" for="Message">Message</label>
                            <textarea name="message" id="Message"class="form-control shadow-lg bg-white rounded-3" type="text">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="reset"
                                class="btn btn-outline-warning shadow-lg  rounded-3 form-control mt-5">Reset</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="submit"
                                class="btn btn-outline-success shadow-lg  rounded-3 form-control mt-5">Register</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </form>



@section('page-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>


<script>
    // toastr.error('hello');
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }


    }
</script>

@if (Session::has('message'))
    <script>
        swal("Great Job!", "{!! Session::get('message') !!}", "info", {
            button: "OK"
        })
        </script>
@endif
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@endsection
