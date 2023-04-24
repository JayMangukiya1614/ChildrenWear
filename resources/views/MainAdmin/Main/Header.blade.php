<aside class="sidebar">
    <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
    </div>
    <div class="side-inner">

        <div class="profile">
            <h6>{{Super()}}</h6>
        </div>

        <div class="counter d-flex justify-content-center">
            <!-- <div class="row justify-content-center"> -->
            <div class="col">
                <strong class="number">{{Post()}}</strong>
                <span class="number-label">Posts</span>
            </div>
            <div class="col">
                <strong class="number">{{Subscribe()}}</strong>
                <span class="number-label">Subscriber</span>
            </div>
            
            <!-- </div> -->
        </div>

        <div class="nav-menu">
            <ul>
                <li><a href="{{url('MDashboard')}}"><span class="icon-search2 mr-3"></span>Dashboard</a></li>

                <li>
                    <div class="dropdown show">
                        <a class=" dropdown-toggle" style="margin-left: 16px;" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Request Manage
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{url('/main-admin')}}">Pending Request</a>
                            <a class="dropdown-item" href="{{url('/accepted-request-show')}}">Accept Request</a>
                            <a class="dropdown-item" href="{{url('/delete-request-show')}}">Delete Request</a>
                        </div>
                </li>
                <li>
                    <div class="dropdown show">
                        <a class=" dropdown-toggle" style="margin-left: 16px;" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Product Page
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{url('/Main-Admin-Product-Table')}}">Product Table</a>
                            <a class="dropdown-item" href="{{url('/Main-Admin-Delete-Product-Table')}}">Delete Product</a>

                        </div>
                </li>
                <li><a href="{{route('Queries')}}"><span class="icon-notifications mr-3"></span> Client Queries</a></li>
                <li><a href="{{url('/Blog-form')}}"><span class="icon-notifications mr-3"></span>Blog Form</a></li>
                {{-- <li><a href="#"><span class="icon-location-arrow mr-3"></span>Direct</a></li>
                <li><a href="#"><span class="icon-pie-chart mr-3"></span>Stats</a></li> --}}
                <li><a href="{{ url('/Madmin-logout') }}"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
            </ul>
        </div>
    </div>

</aside>
<main>
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">








            </div>
        </div>
    </div>
</main>



{{-- <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script> --}}
