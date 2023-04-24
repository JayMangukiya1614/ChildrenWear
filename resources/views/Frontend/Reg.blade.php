<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="ClientCss/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="ClientCss/css/style.css" rel="stylesheet">

    {{-- toastr  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<body>


    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5 pb-0" style="padding-bottom: 0px !important;">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    {{-- <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a> --}}
                    <a href="" class="text-decoration-none">
                        <img src="ClientCss\img\logoFooter.jpg" alt="" style="height : 50px">
                    </a>
                </div>
            </div>

            <div>
                <div class="nav-item p-0 " style="margin-left: 400px;margin-top:9px">
                    <p class="" style="">
                         <a class="" style="color:black;text-decoration:none" href="{{ route('Flogin') }}"><i class="fa-solid fa-users"
                                style="font-size:12px;"></i>&nbsp LogIn</a>
                        <a class="" style="color:black;margin-left:20px;text-decoration:none" href="{{ route('Freg') }}"><i
                                class="fa-solid fa-users" style="font-size:12px;"></i>&nbsp Registration</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Register Here</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Register</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Form start -->
    <section class=" gradient-custom mb-5">
        <div class="container h-100 ">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration">
                        <div class="card-body p-4 p-md-5" style="background-color: rgb(241, 241, 241)">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

                            <form action="{{ route('UserRegSave') }}"method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                           <span class="text-danger" style="font-size: 10px">
                                                @error('firstname')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="text"  value="{{old('firstname')}}" name="firstname" id="firstName"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="firstName">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                          <span class="text-danger" style="font-size: 10px">
                                                @error('lastname')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="text" value="{{old('lastname')}}" name="lastname" id="lastName"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="lastName">Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                          <span class="text-danger" style="font-size: 10px">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="text"  value="{{old('address')}}"name="address" id="address"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="address">Address</label>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                          <span class="text-danger" style="font-size: 10px">
                                                @error('zipcode')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="number" name="zipcode" id="zipcode"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="zipcode">Zip Code</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                           <span class="text-danger" style="font-size: 10px">
                                                @error('birthdate')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="date" max="<?= date('Y-m-d') ?>" value="{{old('birthdate')}}" name="birthdate" id="birthdate"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="birthdate">Birthdate</label>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                          <span class="text-danger" style="font-size: 10px">
                                                @error('state')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="text" value="{{old('state')}}" name="state" id="state"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="state">State</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                           <span class="text-danger" style="font-size: 10px">
                                                @error('city')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="text" value="{{old('city')}}" name="city" id="city"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="city">City</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                           <span class="text-danger" style="font-size: 10px">
                                                @error('phoneno')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="text" value="{{old('phoneno')}}" name="phoneno" class="form-control form-control-lg"
                                                id="birthdayDate" />
                                            <label for="birthdayDate" class="form-label">Phone No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="femaleGender" value="Female" checked />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="maleGender" value="Male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="otherGender" value="Other" />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                          <span class="text-danger" style="font-size: 10px">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="email" value="{{old('email')}}" name="email" id="emailAddress"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="emailAddress">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                          <span class="text-danger" style="font-size: 10px">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                            <input type="password" value="{{old('password')}}" name="password" id="password"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <button class="btn btn-primary btn-lg" type="submit"
                                        value="Submit">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form end -->


    <!-- JavaScript Libraries -->






    <script src="https://kit.fontawesome.com/88bf84b9d4.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="ClientCss/lib/easing/easing.min.js"></script>
    <script src="ClientCss/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="ClientCss/mail/jqBootstrapValidation.min.js"></script>
    <script src="ClientCss/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="ClientCss/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        @if (Session::has('Email'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Email') }}");
        @endif
    </script>

</body>

</html>
