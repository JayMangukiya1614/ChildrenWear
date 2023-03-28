@extends('Frontend.Main.Master')

<title>Our Product</title>

@section('FrontAdmin')
    <style>
        #heart {
            color: grey;
            font-size: 20px;
        }

        #heart.red {
            color: red;
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Product Start -->
    <div class="col-lg-9 col-md-12">
        <div class="row pb-3">
            <div class="col-12 pb-1">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <form action="">
                        <div class="input-group">
                            <input type="search" name="search" class="search rounded" placeholder="Search"
                                aria-label="Search" aria-describedby="search-addon"
                                value="{{ empty($search) ? '' : $search }}" />
                            <button type="submit" class="btn btn-outline-primary rounded d-inline-block"
                                style="margin-right: 0.5rem;">search</button>
                        </div>
                    </form>
                    <div class="dropdown ml-4">
                        <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Sort by
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{ route('Latest-Product', $latest->collection) }}">Latest</a>
                            {{-- <a class="dropdown-item" href="#">Popularity</a>
                            <a class="dropdown-item" href="#">Best Rating</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($data as $data)
                @if ($data->token != 2)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">

                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ asset('ProductImages') }}/{{ $data->productimage }}"
                                    alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $data->productname }}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6 class="text-muted ">₹<del class="ml-1">{{ $data->price }}.00</del>&nbsp;
                                        &nbsp;</h6>
                                    <h6>₹ <span class="ml-1">{{ $data->selling }}</span></h6>
                                    <h6><span class="ml-3 text-success">{{ $data->discount }}% off</span></h6>
                                </div>
                                <p><b>Free Delievery</b></p>
                                @if ($data->stock == 2)
                                    <span class="text-danger">Out Of Stock</span>
                                @endif
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{ route('Product-Detail', $data->id) }}" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="{{ route('Fwishlist', $data->PI_ID) }}" class="btn btn-sm text-dark p-0"><i
                                        class="fa fa-heart" id="heart"></i> <span> Wish List </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- Shop Product End -->
    </div>
    </div>
    <!-- Shop End -->
    <script>
        (function() {
            const heart = document.getElementById('heart');
            heart.addEventListener('click', function() {
                heart.classList.toggle('red');
            });
        })();
    </script>
@endsection
