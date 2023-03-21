@extends('Frontend.Main.Master')

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


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->

                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item"
                                        href="{{ route('Latest-Product', $latest->collection) }}">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($data as $data)
                        @if ($data->token != 2)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">

                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100"
                                            src="{{ asset('ProductImages') }}/{{ $data->productimage }}" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{ $data->productname }}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6 class="text-muted ">₹<del
                                                    class="ml-1">{{ $data->price }}.00</del>&nbsp;
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
                                        <a href="{{ route('Product-Detail', $data->id) }}"
                                            class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                        {{-- <button class="btn btn-sm text-dark p-0" data-toggle="modal"
                                            data-target=".bd-cart-modal-lg"><i
                                                class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button> --}}
                                        <a href="{{ route('Fwishlist', $data->PI_ID) }}"
                                            class="btn btn-sm text-dark p-0"><i class="fa fa-heart" id="heart"></i>  <span> Wish List </span>
                                        </a>
                                    </div>
                                    {{-- <a class="dropdown-item" href="{{route('Latest-Product',$data->id)}}">Latest</a> --}}

                                </div>
                            </div>

                            {{-- cart model view  --}}
                            {{-- <div class="modal fade bd-cart-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <form action=" {{ route('Product-Cart', $data->id) }}" method="POST">
                                            @csrf
                                            {{$data->productname }}
                                            <div class="d-flex mb-3">
                                                <p class="text-dark font-weight-medium mb-0 d-inline-block "
                                                    style="margin-right: 2rem;">Age:
                                                </p>
                                                @foreach (json_decode($data['age']) as $key => $age)
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                            value="{{ $age }}" id="age_{{ $key }}"
                                                            name="age">
                                                        <label class="custom-control-label"
                                                            for="age_{{ $key }}">
                                                            {{ in_array($age, json_decode($data['age'])) ? $age : '' }}</label>
                                                    </div>
                                                @endforeach
                                                <span class="text-danger">
                                                    @error('age')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                            </div>
                                            <div class="d-flex ">
                                                <p class="text-dark font-weight-medium " style="margin-right: 0.8rem;">
                                                    Colors:</p>

                                                @foreach (json_decode($data['color']) as $key => $color)
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                            value="{{ $color }}" id="color_{{ $key }}"
                                                            name="color">
                                                        <label class="custom-control-label"
                                                            for="color_{{ $key }}">
                                                            {{ in_array($color, json_decode($data['color'])) ? $color : '' }}</label>
                                                    </div>
                                                @endforeach
                                                <span class="text-danger">
                                                    @error('color')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>

                                            <div class="d-flex ">
                                                <p class="text-dark font-weight-medium mb-0"
                                                    style="margin-right: 2.1rem;">Size:</p>

                                                @foreach (json_decode($data['size']) as $key => $size)
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                            value="{{ $size }}" id="size_{{ $key }}"
                                                            name="size">
                                                        <label class="custom-control-label"
                                                            for="size_{{ $key }}">
                                                            {{ in_array($size, json_decode($data['size'])) ? $size : '' }}</label>
                                                    </div>
                                                @endforeach
                                                <span class="text-danger">
                                                    @error('size')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="d-flex align-items-center mb-4 pt-2">
                                                <!-- skin 4 -->
                                                <div class="num-block skin-4">
                                                    <div class="num-in">
                                                        <input type="text" id="number" min="1"
                                                            max="10" name="quantity" readonly class="in-num"
                                                            value="1">
                                                        <div class="all-span">
                                                            <span id="plus"class="plus"></span>
                                                            <span id="minus" class="minus dis"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- / skin 4 -->
                                            </div>
                                            <h5 class="text-danger">{{ $data->stock == 1 ? 'In Stock' : 'Out Of Stock' }}
                                            </h5>
                                            @if ($data->stock == 1)
                                                <button class="btn btn-primary px-3"><i
                                                        class="fa fa-shopping-cart mr-1"></i>Add To
                                                    Cart</button>
                                            @else
                                                <button class="btn btn-primary  px-3" disabled><i
                                                        class="fa fa-shopping-cart mr-1"></i>Add To
                                                    Cart</button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        @endif
                    @endforeach


                </div>
                {{-- <div class="row ">
                        {{ $data->links() }}
                    </div> --}}
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
