<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Baby Hub</title>
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
                    
                    <a href="" class="text-decoration-none">
                        <img src="ClientCss\img\logoFooter.jpg" alt="" style="height : 50px">
                    </a>
                </div>
            </div>

            <div>
                <div class="nav-item p-0 " style="margin-left: 400px;margin-top:9px">
                    <p class="" style="">
                       

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
    <form action="{{ route('ForgetPEmailSend') }}" method="POST">
        @csrf
        <section class="mt-5" style="background-color: white">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body p-4" style="background-color: rgb(241, 241, 241 )">
                                        <h4 class="text-center mt-3 mb-4">Forget Password</h4>
                                        <hr class="mt-0 mb-4">

                                        <div class="row">
                                            <div class="col-md-12 form-outline datepicker w-100">
                                                <label class="form-label mb-0" for="email">Email.</label>

                                                <input type="text" style="border-radius: 5px" name="email"
                                                    id="email" class="form-control form-control-lg " />
                                                    <span class="text-danger">
                                                        @error('email')
                                                            {{$message}}
                                                        @enderror
                                                    </span>
                                            </div>
                                        </div>

                                        <hr class="mt-0 mb-4">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="reset" style="border-radius: 5px"
                                                    class="btn  btn-outline-dark waves-effect  w-100">Cancel</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn waves-effect text-dark w-100"
                                                    style="background-color: #D19C97;border-radius:5px">Save</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>





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
        @if (Session::has('Not'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Not') }}");
        @endif

        @if (Session::has('Check'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('Check') }}");
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
