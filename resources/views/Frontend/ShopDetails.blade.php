@extends('Frontend.Main.Master')
<style>
    .skin-4 .num-in {
        float: left;
        width: 80px;
        padding: 8px 0;
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
    }

    .skin-4 .in-num {
        width: 47px;
        float: left;
        height: 36px;
        font-size: 30px;
        text-align: center;
        outline: none;
    }

    .skin-4 .all-span {
        position: relative;
        float: right;
        width: 23px;
        height: 36px;
        border-left: 1px solid #000;
    }

    .skin-4 .all-span span {
        float: left;
        width: 100%;
        height: 18px;
        position: relative;
        cursor: pointer;
    }

    .skin-4 .all-span span:before {
        content: '';
        position: absolute;
        left: 50%;
        margin-left: -5px;
    }

    .skin-4 span.minus:before {
        top: 3px;
        border-top: 5px solid #000;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
    }

    .skin-4 span.minus.dis:before {
        opacity: 0.5;
    }

    .skin-4 span.plus:before {
        bottom: 3px;
        border-bottom: 5px solid #000;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
    }
</style>
@section('FrontAdmin')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    @if (!empty($data->productimage))
        <!-- Shop Detail Start -->
        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                <div class="col-lg-4 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">
                            <div class="carousel-item active">
                                <img class="w-100 images" style="height: 30rem;"
                                    src="  {{ !empty($data->productimage) ? url('ProductImages/' . $data->productimage) : url('ProductImages/default.jfif') }}"
                                    alt="Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 pb-5">
                    <h3 class="font-weight-semi-bold">
                        {{ !empty($data->productname) ? $data->productname : 'Please Select A product' }}</h3>



                    <h4 class="font-weight-semi-bold"> ₹<span id="selling" class="ml-2">{{ $data->selling }}</span>
                    </h4>
                    <p class="font-weight-semi-bold"> ₹ <del class="d-inline-block">{{ $data->price }}.00</del> <span
                            class="text-success ml-3">{{ $data->discount }}% off</span></p>



                    <p class="mb-4"> {{ !empty($data->description) ? $data->description : 'Please Select A product' }}
                    </p>
                    <form action=" {{ route('Product-Cart', $data->id) }}" method="POST">
                        @csrf
                        <div class="d-flex ">
                            <p class="text-dark font-weight-medium  d-inline-block " style="margin-right:2rem">Age:</p>
                            @foreach (json_decode($data['age']) as $key => $age)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="{{ $age }}"
                                        id="age_{{ $key }}" name="age">
                                    <label class="custom-control-label" for="age_{{ $key }}">
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
                            <p class="text-dark font-weight-medium " style="margin-right: 0.8rem;">Colors:</p>

                            @foreach (json_decode($data['color']) as $key => $color)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="{{ $color }}"
                                        id="color_{{ $key }}" name="color">
                                    <label class="custom-control-label" for="color_{{ $key }}">
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
                            <p class="text-dark font-weight-medium mb-0" style="margin-right: 2.2rem;">Size:</p>

                            @foreach (json_decode($data['size']) as $key => $size)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="{{ $size }}"
                                        id="size_{{ $key }}" name="size">
                                    <label class="custom-control-label" for="size_{{ $key }}">
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
                                    <input type="text" id="number" min="1"  max="10" name="quantity" readonly class="in-num"
                                        value="1">
                                    <div class="all-span">
                                        <span id="plus"class="plus"></span>
                                        <span id="minus" class="minus dis"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- / skin 4 -->
                        </div>
                        <h5 class="text-danger">{{ $data->stock == 1 ? 'In Stock' : 'Out Of Stock' }}</h5>
                        @if ($data->stock == 1)
                            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Add To
                                Cart</button>
                        @else
                            <button class="btn btn-primary  px-3" disabled><i class="fa fa-shopping-cart mr-1"></i>Add To
                                Cart</button>
                        @endif
                    </form>



                </div>

            </div>
        </div>

        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                    {{-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a> --}}
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{ $data->Ldescription }}</p>
                    </div>
                    <span style="display:none;" id="sell">{{ $data->selling }}</span>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam
                            invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod
                            consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam.
                            Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos
                            dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod
                            nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt
                            tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h3 class="text-danger text-center">Pleace Go To Back And Select Product</h3>
    @endif
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    {{-- <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('ClientCss/img/clothes/bjeans1.jpg') }}"
                                alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('ClientCss/img/clothes/bjeans1.jpg') }}"
                                alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('ClientCss/img/clothes/bjeans1.jpg') }}"
                                alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('ClientCss/img/clothes/bjeans1.jpg') }}"
                                alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('ClientCss/img/clothes/bjeans1.jpg') }}"
                                alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i
                                    class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Products End -->
    <script>
        /////////////////// product +/-
        $(document).ready(function() {
            $('.num-in span').click(function() {
                var $input = $(this).parents('.num-block').find('input.in-num');
                if ($(this).hasClass('minus')) {
                    var count = parseFloat($input.val()) - 1;
                    count = count < 1 ? 1 : count;
                    if (count < 2) {
                        $(this).addClass('dis');
                    } else {
                        $(this).removeClass('dis');
                    }
                    $input.val(count);
                } else {
                    var count = parseFloat($input.val()) + 1
                    $input.val(count);
                    if (count > 1) {
                        $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                    }
                }

                $input.change();
                return false;
            });

        });
        // product +/-

        $(document).ready(function() {
            $('#plus').on('click', function() {
                var sell = document.getElementById("sell").innerHTML;

                var number = $('#number').val();

                var price = sell * number;
                parseFloat(price).toFixed(2);
                $('#selling').text(price);
                $('#selling').css('margin-right:8px');


            })
            $('#minus').on('click', function() {
                var sell = document.getElementById("sell").innerHTML;

                var number = $('#number').val();
                if (number == 1) {
                    var price = sell;
                } else {
                    var price = (sell * number) - sell;
                }

                $('#selling').text(price);
                $('#selling').css("margin-right", "8px");

            })
        });

        @if (Session::has('Product'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('Product') }}");
        @endif
    </script>
@endsection
