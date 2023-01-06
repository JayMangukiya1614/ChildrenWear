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

    <div class="container border rounded-2 shadow-lg bg-white mb-2 form-group mt-3 p-4 mb-3">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-shadow: 2px 2px #EDF1FF;" class="text-center text-dark  shadow-lg bg-white p-4 border">
                    Baby Hub Admin Registration </h3>
            </div>
        </div>
        <form action="{{route('Admin-Reg-Save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row ">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img id="previewImg" class="image rounded-circle" src="{{ asset('images/default.jpeg') }}"
                            alt="profile image ">
                        <input type="file" name="file"onchange="previewFile(this)">
                        {{-- <span class="text-danger">
                            @error('file')
                                {{ $message }}
                            @enderror
                        </span> --}}
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="mt-5" for="First_Name">First Name</label>
                            <input name="firstname" id="First_Name" class="form-control shadow-lg bg-white"
                                type="text">
                            <span class="text-danger">
                                @error('$datae->firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Last_Name">Last Name</label>
                            <input name="lastname" id="Last_Name"type="text" class="shadow-lg bg-white form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Middle_Name">Middle Name</label>
                            <input name="middlename  "id="Middle_Name" type="text"
                                class="shadow-lg bg-white form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="mt-4" for="">Education</label>
                            <select name="education" class="form-control shadow-lg bg-white rounded-3" id="">
                                <option selected value="Undergraduate">Undergraduate</option>
                                <option value="Postgraduate">Postgraduate</option>

                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="">Gender</label>
                            <select name="gender" class="form-control shadow-lg bg-white rounded-3" id="">
                                <option selected value="Male">Male</option>
                                <option value="Feale">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="Country">Country</label>
                            <select name="country" class="form-control  shadow-lg bg-white rounded-3" name="Country"
                                id="">
                                <option selected value="Canada">Canada</option>
                                <option value="German">German</option>
                                <option value="U.S.A">U.S.A</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="mt-4" for="City">City</label>
                            <select name="city" class="form-control  shadow-lg bg-white rounded-3" name="Gender"
                                id="">
                                <option selected value="Delhi">Delhi</option>
                                <option value="Bombay">Bombay</option>
                                <option value="Banglore">Banglore</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="MN">Mobile Nomber</label>
                            <input name="mobilenumber" id="MN" class="form-control shadow-lg bg-white"
                                type="number">
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="GSTNO">GST NO.</label>
                            <input name="gstno" id="GSTNO" class="form-control shadow-lg bg-white"
                                type="text">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="mt-5" for="Bank_Name">Bank Name:</label>
                            <input name="bankname" id="Bank_Name" class="form-control shadow-lg bg-white"
                                type="text">
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="Branch_Name">Branch Name</label>
                            <input name="branchname" id="Branch_Name" type="text"
                                class="shadow-lg bg-white form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="IFSC_Code">IFSC Code</label>
                            <input name="ifsccode" id="IFSC_Code" type="text"
                                class="shadow-lg bg-white form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="E_mail">E_mail</label>
                            <input name="email" id="E_mail" class="form-control shadow-lg bg-white"
                                type="email">
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="Password">Password</label>
                            <input name="password" id="Password" class="form-control shadow-lg bg-white"
                                type="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-5" for="Address">Address</label>
                            <textarea name="address" id="Address" class="form-control shadow-lg bg-white rounded-3" type="text"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-5" for="Message">Message</label>
                            <textarea name="message" id="Message" class="form-control shadow-lg bg-white rounded-3" type="text"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#"
                                class="btn btn-outline-warning shadow-lg  rounded-3 form-control mt-5">Reset</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit"
                                class="btn btn-outline-success shadow-lg  rounded-3 form-control mt-5">Register</button>
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
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }

        }
        $(document).ready(function(){

            @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('message') }}");
            @endif
        });
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
