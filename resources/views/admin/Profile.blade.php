@extends('layouts/contentNavbarLayout')

<style>
    body {
        background: #EDF1FF
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(123, 118, 125);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        color: black;
        background: #EDF1FF
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #e4cfe7;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>

@section('title', 'Dashboard - Analytics')

@section('vendor-style')

@endsection



@section('content')

    <div class="container rounded bg-white ">
        <form action="{{ route('Admin-Profile-save', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3 border-right">
                    <input type="text" name="AD_ID" value="{{ $data->AD_ID }}" style="display: none">
                    <input type="text" name="gender" value="{{ $data->gender }}" style="display: none">
                    <input type="text" name="password" value="{{ $data->password }}" style="display: none">
                    <input type="text" name="message" value="{{ $data->message }}" style="display: none">



                    <div class="d-flex flex-column aligan-items-center text-center p-5 py-5">
                        <label for="file-input">
                            <img id="previewImg" class="rounded-circle mt-5" width="150px"
                                src="{{ !empty($data->profileimage) ? url('images/' . $data->profileimage) : url('images/default.jpeg') }}">
                        </label>
                        <input id="file-input" name="profileimage" type="file" onchange="previewFile(this);"
                            style="display: none" />
                        <span class="font-weight-bold">{{ $data->firstname }} {{ $data->middlename }}
                            {{ $data->lastname }}</span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Details</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels"> First Name</label>
                                <input type="text" class="form-control" name="firstname" value="{{ $data->firstname }}">
                                <span class="text-danger">
                                    @error('firstname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="labels"> Middle Name</label>
                                <input type="text" class="form-control" name="middlename"
                                    value=" {{ $data->middlename }}">
                                <span class="text-danger">
                                    @error('middlename')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="labels"> Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="{{ $data->lastname }}">
                                <span class="text-danger">
                                    @error('lastname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Mobile Number</label>
                                <input type="text"class="form-control" name="mobilenumber"
                                    value=" {{ $data->mobilenumber }}">
                                <span class="text-danger">
                                    @error('mobilenumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Shop Name</label>
                                <input type="text"class="form-control" name="shopname" value=" {{ $data->shopname }}">
                                <span class="text-danger">
                                    @error('shopname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mt-3">Pincode</label>
                                <input type="text" class="form-control" name="pincode" value=" {{ $data->pincode }}">
                                <span class="text-danger">
                                    @error('pincode')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
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
                            </div>

                            <div class="col-md-6">
                                <label class="labels mt-3">State</label>
                                <select name="state" value="{{ old('state') }}" class="form-control  " name="state"
                                    id="">
                                    <option {{ $data->state == 'Goa' ? 'selected' : '' }} value="Goa">Goa</option>
                                    <option {{ $data->state == 'Goa' ? 'Gujrat' : '' }} value="Gujrat">Gujrat</option>
                                    <option {{ $data->state == 'Goa' ? 'Kerala' : '' }} value="Kerala">Kerala</option>
                                </select>
                                <span class="text-danger">
                                    @error('state')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label class="labels mt-3">City</label>
                                <select name="city" value="{{ old('state') }}" class="form-control " name="city"
                                    id="">city
                                    <option {{ $data->city == 'Delhi' ? 'selected' : '' }} value="Delhi">Delhi</option>
                                    <option {{ $data->city == 'Bombay' ? 'selected' : '' }} value="Bombay">Bombay</option>
                                    <option {{ $data->city == 'Banglore' ? 'selected' : '' }} value="Banglore">Banglore
                                    </option>
                                </select>

                                <span class="text-danger">
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12">
                                <label class="labels mt-3">Address</label>
                                <input type="text"class="form-control" name="address"value=" {{ $data->address }}">
                                <span class="text-danger">
                                    @error('address')
                                        {{ $message }}
                                    @enderror

                                </span>
                            </div>
                            <div class="col-md-12">
                                <label class="labels mt-3">Email</label>
                                <input type="text" class="form-control" readonly name="email"
                                    value=" {{ $data->email }}">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class=" py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Bank
                                Details</span></div><br>
                        <div class="col-md-12">
                            <label class="labels ">Bank Name</label>
                            <input type="text"class="form-control " readonly name="bankename"
                                value=" {{ $data->bankname }}">
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label class="labels">Branch</label>
                            <input type="text" class="form-control " readonly name="branchname"
                                value=" {{ $data->branchname }}">
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label class="labels">IFSC Code</label>
                            <input type="text" class="form-control " readonly name="ifsccode"
                                value=" {{ $data->ifsccode }}">
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label class="labels">GST No.</label>
                            <input type="text" class="form-control " readonly name="gstno"
                                value=" {{ $data->gstno }}">
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class=""><button class="btn btn-primary profile-button float-right"
                                type="submit">Save
                                Profile</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@section('page-script')
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

    <script>
        @if (Session::has('Update'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('Update') }}");
        @endif
    </script>
@endsection

@section('page-script')
@endsection
@endsection
