<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
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
                        <img src="ClientCss\img\logoFooter.jpg" alt="" style="height : 50px">
                </div>
            </div>
            <div>
                <div class="nav-item p-0 " style="margin-left: 400px;margin-top:9px">
                    <p >
                        {{-- <a class="" style="color:black" href="{{ route('Flogin') }}">LogIn  </a>
                        <a class="" style="color:black" href="{{ route('Freg') }}">Registration</a> --}}

                        <a class="" style="color:black;text-decoration:none" href="{{ route('Flogin') }}"><i
                                class="fa-solid fa-users" style="font-size:12px;"></i>&nbsp LogIn</a>
                        <a class="" style="color:black;margin-left:20px;text-decoration:none"
                            href="{{ route('Freg') }}"><i class="fa-solid fa-users" style="font-size:12px;"></i>&nbsp
                            Registration</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Login Here</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Login</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- section start -->
    <section class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 box">
                    <form action="{{ route('Checklogin') }}" method="POST" class="mb-5 border p-5"
                        style="background-color: rgb(241, 241, 241);border-radius:5px">
                        @csrf
                        <h2 class="mb-3" style="text-align:center">Login</h2>

                        <div class="row text-dark">
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <span class="text-danger" style="font-size: 12px;margin-left:2%">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" style="background-color:  white !important;" name="email"
                                    id="email" class="form-control ">
                            </div>
                        </div>
                        <div class="row mb-4 text-dark">
                            <div class="col-md-12 form-group">
                                <label for="password">Password</label>
                                 <span class="text-danger" style="font-size: 12px;margin-left:2%">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="password" name="password" id="password" class="form-control ">
                            </div>
                        </div>

                        <div class="col-md-12 text-left">
                            <button type="submit" value="submit" class="btn primary-btn"
                                style="background-color: #c5837c; color:black">
                                LogIn
                            </button>
                        </div>
                        <div class="div">
                            <div class="row mt-3">
                                <a href="{{ route('ForgetPEmail') }}" class="font-weight-semi-bold"
                                    style="color:rgb(0, 0, 0); margin-left:36%">Forget Password ?</a>
                                <a class="btn btn-lg btn-google  mt-3 ml-5 " href="{{route('login.google.redirect')}}"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Signup Using Google</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

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
        @if (Session::has('Reg'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('Reg') }}");
        @endif

        @if (Session::has('Password'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Password') }}");
        @endif
        @if (Session::has('Forget-Password-Update'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('Forget-Password-Update') }}");
        @endif

        @if (Session::has('Email'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Email') }}");
        @endif

        @if (Session::has('Logout'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('Logout') }}");
        @endif

        @if (Session::has('fail'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('fail') }}");
        @endif
    </script>

</body>

</html>
