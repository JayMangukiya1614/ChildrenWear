<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5" style="padding-bottom: 0px !important;">
        <div class="col-lg-6 ">
            <div class="d-inline-flex ">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
        <div>
            <div class="nav-item p-0 " style="margin-left: 390px;margin-top:3px">
                <p class="" style="">

                    @if (!session()->has('ULogin'))
                        <a class="" style="color:black;text-decoration:none" href="{{ route('Flogin') }}"><i
                                class="fa-solid fa-users" style="font-size:12px;"></i>&nbsp LogIn</a>
                        <a class="" style="color:black;margin-left:20px;text-decoration:none"
                            href="{{ route('Freg') }}"><i class="fa-solid fa-users" style="font-size:12px;"></i>&nbsp
                            Registration</a>
                    @else
                        <div class="dropdown">
                            <a class="dropbtn" style="color:black;text-decoration:none" href=""><i
                                    class="fa-solid fa-user mr-1"></i> My Account <i class="fa-solid fa-chevron-down"
                                    style="font-size:12px;"></i></a>
                            <div class="dropdown-content">
                                <a href="{{ route('Fprofile') }}" style="font-size: 15px"><i
                                        class="far fa-edit mr-1"></i> Edit Profile</a>
                                <a href="{{ route('Fpassword') }}" style="font-size: 15px"><i
                                        class="fa-solid fa-key mr-1"></i> Change Password</a>

                                <a href="{{ route('Admin-Login') }}" style="font-size: 15px"><i class="fa-solid fa-right-to-bracket mr-1"></i></i> Admin Login</a>
                            </div>
                        </div>
                        <a class="" style="color:black;margin-left:20px;text-decoration:none"
                            href="{{ route('Flogout') }}"><i class="fa-solid fa-right-from-bracket"
                                style="font-size:15px;"></i>&nbspLogout</a>
                    @endif


                </p>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <img src="{{ asset('ClientCss\img\logoHeader.png') }}" alt="" style="height : 90px">
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="{{ route('Fcart') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">
                    {{-- @php
                        $total = 0;
                        $key = 1;
                    @endphp

                    @if ($Cart != null)

                        @foreach ($Cart as $Cart)
                            <?php
                            $total = $total + $key;
                            ?>
                        @endforeach
                        {{ $total }}
                    @else
                    
                        {{ $total }}
                    @endif --}}
                </span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between mb-5" style="background-color: #EDF1FF"
                    id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0" style="margin-left:22rem">
                        <a href="{{ route('Findex') }}" class="nav-item nav-link">Home</a>
                        <div class="dropdown">
                            <a class="dropdown-toggle nav-item nav-link" data-toggle="dropdown">
                                Boy Fashion
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('Products', $id = 1) }}">Shirts</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 2) }}">T-shirts</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 3) }}">Jeans And
                                    Trouser</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 4) }}">Sweatshirts</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 5) }}">Jackets</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 6) }}">Ethnic Wear</a>



                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle nav-item nav-link" data-toggle="dropdown">
                                Girl Fashion
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('Products', $id = 7) }}">Sets & Suits</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 8) }}">Tops & T-shirts</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 9) }}">Jeans & Jeggings</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 10) }}">Sweatshirts</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 11) }}">Jumpsuits &
                                    Dungarees</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 12) }}">Ethnic Wear</a>
                            </div>
                        </div>
                        <a href="{{ route('Fcontact') }}" class="nav-item nav-link">Contact</a>

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->
