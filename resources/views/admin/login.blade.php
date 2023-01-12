<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="Admin/AdminloginCss/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin-Log-In</title>
    
</head>


<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    {{-- <h2 class="heading-section">Login #03</h2> --}}
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#"
                                        class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-facebook"></span></a>
                                    <a href="#"
                                        class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>
                        <form action="{{route('Alogindata')}}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-user"></span></div>
                                <input type="text" name="email" class="form-control rounded-left" placeholder="Username" >
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-lock"></span></div>
                                <input type="password" name="password" class="form-control rounded-left" placeholder="Password">
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <div class="w-100">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Save Password
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-100 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary rounded submit">Login</button>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="w-100 text-center">
                                    <p class="mb-1">Don't have an account? <a href="{{route('Admin-Reg')}}">Sign Up</a></p>
                                    <p><a href="#">Forgot Password</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
     integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        (function($) {

            "use strict";


        })(jQuery);
    
          
        @if (Session::has('fail'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.danger("{{ session('fail') }}");
        @endif
        
    </script>
</body>

</html>
