<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin_Registration</title>
</head>
<style>
    body {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .image {
        width: 300px !important;
        height: 300px;
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

<body>

    </form>

    <div class="container-fluid border rounded-2 shadow-lg bg-white mb-2 form-group mt-3 p-4 mb-3">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-shadow: 2px 2px #EDF1FF;" class="text-center text-dark  shadow-lg bg-white p-4 border">
                    Admin Details</h3>
            </div>
        </div>
        <form action="{{route('accept-request',$data->id)}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row ">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        <label for="file-input">
                            <img id="previewImg" class="image rounded-circle"
                            src="{{asset('images')}}/{{$data -> profileimage}}" />
                        </label>

                        <input id="file-input" value="{{$data->profileimage}}" name="profileimage" type="file" onchange="previewFile(this);"
                            style="display: none;" />
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="mt-5" for="Last_Name">Last Name</label>
                            <input name="lastname" disabled value="{{$data->lastname}}" id="Last_Name"type="text"
                            class="shadow-lg bg-white form-control">
                            
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="First_Name">First Name</label>
                            <input name="firstname" disabled value="{{$data->firstname}}" id="First_Name"
                                class="form-control shadow-lg bg-white" type="text">
                           
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Middle_Name">Middle Name</label>
                            <input name="middlename" disabled value="{{$data->middlename}}" id="Middle_Name"type="text"
                                class="shadow-lg bg-white form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mt-4" for="">Education</label>
                            <select name="education" disabled value="{{$data->education}}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option  value="Undergraduate">Undergraduate</option>
                                <option value="Postgraduate">Postgraduate</option>

                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="">Gender</label>
                            <select name="gender" disabled value="{{$data->gender}}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option  {{$data->gender == 'Male' ? 'selected' : ''}} name="gender"  value="Male">Male</option>
                                <option  {{$data->gender == 'Female' ? 'selected' : ''}} name="gender" value="Female">Female</option>
                                <option   {{$data->gender == 'Other' ? 'selected' : ''}} name="gender" value="Other">Other</option>
                            </select>
                
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="Country">Country</label>
                            <select name="country" disabled value="{{$data->country}}"
                                class="form-control  shadow-lg bg-white rounded-3" name="Country" id="">
                                <option {{$data->country == 'Canada' ? 'selected' : ''}} name="country"  value="Canada">Canada</option>
                                <option {{$data->country == 'German' ? 'selected' : ''}} name="country" value="German">German</option>
                                <option {{$data->country == 'U.S.A' ? 'selected' : ''}} name="country" value="U.S.A">U.S.A</option>
                                
                            </select>
                           
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="City">City</label>
                            <select name="city" disabled value="{{$data->city}}"
                                class="form-control  shadow-lg bg-white rounded-3" id="city">
                                <option  {{$data->city == 'Delhi' ? 'selected' : ''}} name="city" value="Delhi">Delhi</option>
                                <option {{$data->city == 'Bombay' ? 'selected' : ''}} name="city" value="Bombay">Bombay</option>
                                <option {{$data->city == 'Banglore' ? 'selected' : ''}} name="city" value="Banglore">Banglore</option>
                            </select>
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="MN">Mobile Nomber</label>
                            <input name="mobilenumber" disabled value="{{$data->mobilenumber}}" id="MN"
                                class="form-control shadow-lg bg-white" type="number">
                            
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="GSTNO">GST NO.</label>
                            <input name="gstno" disabled value="{{$data->gstno}}" id="GSTNO"
                                class="form-control shadow-lg bg-white" type="text">
                          
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="mt-5" for="Bank_Name">Bank Name:</label>
                            <input name="bankname" disabled value="{{$data->bankname}}" id="Bank_Name"
                                class="form-control shadow-lg bg-white" type="text">
                          
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Branch_Name">Branch Name</label>
                            <input name="branchname" disabled id="Branch_Name" type="text"
                                value="{{$data->branchname}}" class="shadow-lg bg-white form-control">
                          
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="IFSC_Code">IFSC Code</label>
                            <input name="ifsccode" disabled id="IFSC_Code" type="text" value="{{$data->ifsccode}}"
                                class="shadow-lg bg-white form-control">
                            
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="E_mail">E_mail</label>
                            <input name="email" disabled id="E_mail" class="form-control shadow-lg bg-white"
                                value="{{$data->email}}" type="email">
                          
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="Passwo">Password</label>
                            <input name="password" disabled id="Passwo" class="form-control shadow-lg bg-white"
                                value="{{$data->password}}" type="password">
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-5" for="Address">Address</label>
                            <textarea name="address" disabled id="Address" class="form-control shadow-lg bg-white rounded-3" type="text">{{$data->address}}</textarea>
                           
                        </div>

                        <div class="col-md-6">
                            <label class="mt-5" for="Message">Message</label>
                            <textarea name="message" disabled id="Message" class="form-control shadow-lg bg-white rounded-3" type="text">{{$data->message}}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="mt-5" for="sAddress">Send Message</label>
                            <textarea name="sendmessage"  id="sAddress" class="form-control shadow-lg bg-white rounded-3" type="text"></textarea>
                           
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-4">
                            <a   href="{{route('main-admin-read')}}"  class="btn btn-outline-info shadow-lg  rounded-3 form-control mt-5">Back</a>
                        </div> --}}
                        <div class="col-md-6">
                            <a   href="{{route('cancel-request',$data->id)}}"  class="btn btn-outline-danger shadow-lg  rounded-3 form-control mt-5">Cancel</a>
                        </div>
                        
                        <div class="col-md-6">
                            <button value="1" class="btn btn-outline-success shadow-lg  rounded-3 form-control mt-5">Accept</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <!-- Toastr CDN -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Toastr CDN -->

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
            var check = $("#file-input").val();
            // alert(check);
            if (check) {
                $("#note").html("");
                // $("#note").removeclass("");

            }
            // $('#submit').click(function() {
              
            // });

        }
        // $(document).ready(function() {

        //     @if (Session::has('message'))
        //         toastr.options = {
        //             "closeButton": true,
        //             "progressBar": true
        //         }
        //         toastr.info("{{ session('message') }}");
        //     @endif
        // });
    </script>

    @if (Session::has('message'))
        <script>
            swal("Great Job!", "{!! Session::get('message') !!}", "info", {
                button: "OK"
            })
        </script>
    @endif
</body>

</html>
