<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5" style="padding-bottom: 0px !important;">
        <div class="col-lg-6 ">
            <div class="col-lg-3 d-lg-block">
                <a href="" class="text-decoration-none">
                    <img src="{{ asset('ClientCss\img\logofooter.jpg') }}" alt="" style="height : 50px">
                </a>
            </div>
        </div>
        <div>
            <div class="nav-item p-0 " style="margin-left: 390px;">
                @if (!session()->has('ULogin'))
                    <span class="d-inline-block" style="margin-top: 7px!important;">
                        <a class="" style="color:black;text-decoration:none" href="{{ route('Flogin') }}"><i
                                class="fa-solid fa-users" style="font-size:12px;"></i>&nbsp LogIn</a>
                        <a class="" style="color:black;margin-left:20px;text-decoration:none"
                            href="{{ route('Freg') }}"><i class="fa-solid fa-users" style="font-size:12px;"></i>&nbsp
                            Registration</a>
                    </span>
                @else
                    <span class="d-inline-block" style="margin-top: 7px!important;">
                        <div class="dropdown">
                            <a class="dropbtn" style="color:black;text-decoration:none" href=""><i
                                    class="fa-solid fa-user mr-1"></i> My Account <i class="fa-solid fa-chevron-down"
                                    style="font-size:12px;"></i></a>
                            <div class="dropdown-content" style="z-index: 2 !important">
                                <a href="{{ route('Fprofile') }}" style="font-size: 15px"><i
                                        class="far fa-edit mr-1"></i>
                                    Edit Profile</a>
                                <a href="{{ route('Fpassword') }}" style="font-size: 15px"><i
                                        class="fa-solid fa-key mr-1"></i> Change Password</a>
                            </div>
                        </div>
                        <a class="" style="color:black;margin-left:20px;text-decoration:none"
                            href="{{ route('Flogout') }}"><i class="fa-solid fa-right-from-bracket"
                                style="font-size:15px;"></i>&nbspLogout</a>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-8 col-6 text-left">
            <nav class="navbar navbar-expand-lg bg-light navbar-light justify-content-start py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0" style="margin-left:2rem">
                        <a href="{{ route('Findex') }}"
                            class="nav-item nav-link mx-3 {{ Route::current()->getName() == 'Findex' ? 'active' : '' }}">Home</a>
                        <div class="dropdown mx-3">
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
                        <div class="dropdown mx-3">
                            <a class="dropdown-toggle nav-item nav-link" data-toggle="dropdown">
                                Girl Fashion
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('Products', $id = 7) }}">Sets & Suits</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 8) }}">Tops &
                                    T-shirts</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 9) }}">Jeans &
                                    Jeggings</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 10) }}">Jumpsuits &
                                    Dungarees</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 11) }}">Jackets</a>
                                <a class="dropdown-item" href="{{ route('Products', $id = 12) }}">Ethnic Wear</a>
                            </div>
                        </div>
                        <div class="dropdown ">
                            <a class="dropdown-toggle nav-item nav-link" data-toggle="dropdown">
                                My Order
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('OrderTable') }}">Pending Order</a>
                                <a class="dropdown-item" href="{{ route('COrderTable') }}">Confirm Order</a>
                                {{-- <a class="dropdown-item" href="{{ route('DOrderTable') }}">Delivered Order</a> --}}
                                <a class="dropdown-item" href="{{ route('DeleteOrderTable') }}">Delete Order</a>
                            </div>
                        </div>

                         <a href="{{ route('Fcontact') }}"
                            class="nav-item nav-link mx-3 {{ Route::current()->getName() == 'Fcontact' ? 'active' : '' }}">Contact</a>

                          <a href="{{ route('Fblog') }}"
                            class="nav-item nav-link  {{ Route::current()->getName() == 'Fblog' ? 'active' : '' }}">Blog</a>

                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-4 col-6 text-right p-0">
            <a href="{{ route('FwishlistTable') }}" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">
                    @if (count(wishlist()) > 0)
                        {{ count(wishlist()) }}
                    @else
                        @php
                            echo '0';
                        @endphp
                    @endif
                </span>
            </a>
            <a href="{{ route('Fcart') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">
                    @if (count(cart()) > 0)
                        {{ count(cart()) }}
                    @else
                        @php
                            echo '0';
                        @endphp
                    @endif
                </span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->
