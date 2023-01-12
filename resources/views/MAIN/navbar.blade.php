
    <nav class="navbar fixed-top">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="{{route('main-admin-read')}}">Pending Request</a></li>
                <li><a href="{{route('accepted-request-show')}}">Accepted Request</a></li>
                <li><a href="{{route('delete-request-show')}}">Delete Request</a></li>
                <li><a href="{{route('Madmin-logout')}}">Logout</a></li>
                {{-- <li>{{$name->Name}}</li> --}}

             
            </ul>
            <h1 class="logo">Baby Hub</h1>
        </div>
    </nav>
