@extends('MainAdmin.Main.Master')

@section('FrontAdmin')
    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .image {
            width: 200px !important;
            height: 200px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #EDF1FF;
        }

        .profile-button {
            background: #EDF1FF;
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #EDF1FF;
        }

        .profile-button:focus {
            background: #EDF1FF;
            box-shadow: none
        }

        .profile-button:active {
            background: #EDF1FF;
            box-shadow: none
        }

        .back:hover {
            color: #EDF1FF;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #EDF1FF;
            color: #fff;
            cursor: pointer;
            border: solid 1px #EDF1FF
        }
    </style>


    <div class="container-fluid border rounded-2 shadow-lg bg-white mb-2 form-group mt-3 p-4 mb-3">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-shadow: 2px 2px #EDF1FF;" class="text-center text-dark  shadow-lg bg-white p-4 border">
                    Seller Details</h3>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row ">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        <label for="file-input">
                            <img id="previewImg" class="image rounded-circle"
                                src=" {{ !empty($data->profileimage) ? url('images/' . $data->profileimage) : url('images/default.jpeg') }}"
                                selected />
                        </label>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="mt-5" for="First_Name">First Name</label>
                            <input name="firstname" disabled value="{{ $data->firstname }}" id="First_Name"
                                class="form-control shadow-lg bg-white" type="text">
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Middle_Name">Middle Name</label>
                            <input name="middlename" disabled value="{{ $data->middlename }}" id="Middle_Name"type="text"
                                class="shadow-lg bg-white form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Last_Name">Last Name</label>
                            <input name="lastname" disabled value="{{ $data->lastname }}" id="Last_Name"type="text"
                                class="shadow-lg bg-white form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="sn">Shop Name</label>
                            <input name="shopname" disabled value="{{ $data->shopname }}" id="sn"
                                class="form-control shadow-lg bg-white" type="text">

                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="pincode">Pincode</label>
                            <input name="pincode" disabled value="{{ $data->pincode }}" id="pincode"
                                class="form-control shadow-lg bg-white" type="number">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mt-4" for="">Education</label>
                            <select name="education" disabled value="{{ $data->education }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Postgraduate">Postgraduate</option>

                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="">Gender</label>
                            <select name="gender" disabled value="{{ $data->gender }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option {{ $data->gender == 'Male' ? 'selected' : '' }} name="gender" value="Male">Male
                                </option>
                                <option {{ $data->gender == 'Female' ? 'selected' : '' }} name="gender" value="Female">
                                    Female</option>
                                <option {{ $data->gender == 'Other' ? 'selected' : '' }} name="gender" value="Other">
                                    Other</option>
                            </select>

                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="Country">state</label>
                            <select name="state" disabled value="{{ $data->state }}"
                                class="form-control  shadow-lg bg-white rounded-3" name="state" id="">
                                <option {{ $data->state == 'Goa' ? 'selected' : '' }} name="state" value="Goa">Goa
                                </option>
                                <option {{ $data->state == 'Gujrat' ? 'selected' : '' }} name="state" value="Gujrat">
                                    Gujrat</option>
                                <option {{ $data->state == 'Kerala' ? 'selected' : '' }} name="state" value="Kerala">
                                    Kerala</option>

                            </select>

                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="City">City</label>
                            <select name="city" disabled value="{{ $data->city }}"
                                class="form-control  shadow-lg bg-white rounded-3" id="city">
                                <option {{ $data->city == 'Delhi' ? 'selected' : '' }} name="city" value="Delhi">
                                    Delhi</option>
                                <option {{ $data->city == 'Bombay' ? 'selected' : '' }} name="city" value="Bombay">
                                    Bombay</option>
                                <option {{ $data->city == 'Banglore' ? 'selected' : '' }} name="city"
                                    value="Banglore">Banglore</option>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="MN">Mobile Number</label>
                            <input name="mobilenumber" disabled value="{{ $data->mobilenumber }}" id="MN"
                                class="form-control shadow-lg bg-white" type="number">

                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="GSTNO">GST NO.</label>
                            <input name="gstno" disabled value="{{ $data->gstno }}" id="GSTNO"
                                class="form-control shadow-lg bg-white" type="text">

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-5" for="Bank_Name">Bank Name:</label>
                            <input name="bankname" disabled value="{{ $data->bankname }}" id="Bank_Name"
                                class="form-control shadow-lg bg-white" type="text">

                        </div>
                        <div class="col-md-6">
                            <label class="mt-5" for="Branch_Name">Branch Name</label>
                            <input name="branchname" disabled id="Branch_Name" type="text"
                                value="{{ $data->branchname }}" class="shadow-lg bg-white form-control">

                        </div>
                        

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="E_mail">E_mail</label>
                            <input name="email" disabled id="E_mail" class="form-control shadow-lg bg-white"
                                value="{{ $data->email }}" type="email">

                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="IFSC_Code">IFSC Code</label>
                            <input name="ifsccode" disabled id="IFSC_Code" type="text" value="{{ $data->ifsccode }}"
                                class="shadow-lg bg-white form-control">

                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label class="mt-3" for="Message">Message</label>
                            <textarea name="message" disabled id="Message" class="form-control shadow-lg bg-white rounded-3" type="text">{{ $data->message }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('cancel-request', $data->id) }}"
                                class="btn btn-outline-danger shadow-lg  rounded-3 form-control mt-5">Delete</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('accepted-request-show') }}"
                                class="btn btn-outline-danger shadow-lg  rounded-3 form-control mt-5">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
