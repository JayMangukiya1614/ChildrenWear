@extends('Frontend.Main.Master')
<title>Index</title>

@section('FrontAdmin')
    {{-- Corasol start --}}
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 410px;">
                <img class="img-fluid" src="{{ asset('ClientCss/img/cloths/index/b1.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h4 class="text-light text-uppercase font-weight-medium mb-3">Some Discount Off Your
                            Order</h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                        {{-- <a href="" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height: 410px;">
                <img class="img-fluid" src="{{ asset('ClientCss/img/cloths/index/b2.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h4 class="text-light text-uppercase font-weight-medium mb-3">Some Discount Off Your
                            Order</h4>
                        <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                        {{-- <a href="" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
    {{-- End Corasol --}}

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div> --}}
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <h1 class="text-center">And You Can't Miss Out On Under <i class="fa-solid fa-indian-rupee-sign"
            style="font-size: 35px"></i> 500</h1>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{asset('ProductImages\shirt3.jpg')}}" alt="">
                    </p>
                    <h5 class="font-weight-semi-bold m-0">Shirts</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{asset('ProductImages\jeans5.jpg')}}" alt="">
                    </p>
                    <h5 class="font-weight-semi-bold m-0">Jeans & Trousers</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{asset('ProductImages\sweatshirt6.jpg')}}" alt="">
                    </p>
                    <h5 class="font-weight-semi-bold m-0">Sweatshirts</h5>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{asset('ProductImages\Gsets&suits7.jpg')}}" alt="">
                    </p>
                    <h5 class="font-weight-semi-bold m-0">Sets & Suits</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{asset('ClientCss\img\cloths\gjeans2.jpg')}}" alt="">
                    </p>
                    <h5 class="font-weight-semi-bold m-0">Jeans & Jeggings</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{asset('ClientCss\img\cloths\gdungree1.jpg')}}" alt="">
                    </p>
                    <h5 class="font-weight-semi-bold m-0">Jumpsuits & Dungarees</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="ClientCss\img\cloths\summer collection.jpg" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">10% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Summer Collection</h1>
                        <a href="{{route('Products',$id = 8)}}" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="ClientCss\img\cloths\winter collection.jpg" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">10% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="{{route('Products',$id = 11)}}" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Latest Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($data as $data)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                           <a href="{{route('Products',$data->collection)}}"> <img class="img-fluid w-100"
                                src=" {{ !empty($data->productimage) ? url('ProductImages/' . $data->productimage) : url('ProductImages/default.jfif') }}"
                                alt=""></a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$data->productname}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6 class="text-muted ml-2"><del > ₹ {{$data->price}}</del></h6>
                                <h6 class="ml-3"> ₹ {{$data->selling}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->




    <script>
        @if (Session::has('LoginSuccess'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('LoginSuccess') }}");
        @endif
    </script>
@endsection
