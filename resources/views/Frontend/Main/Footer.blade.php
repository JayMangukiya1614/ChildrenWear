<style>
    .footer-32892 .row.gallery {
        margin-right: -5px;
        margin-left: -5px;
    }

    .footer-32892 .row.gallery>[class^="col-"],
    .footer-32892 .row.gallery>[class*=" col-"] {
        padding-right: 5px;
        padding-left: 5px;
    }

    .footer-32892 .gallery a {
        display: block;
        margin-bottom: 10px;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .footer-32892 .gallery a:hover {
        opacity: .5;
    }

    .footer-img-fluid {
        width: 100% !important;
        height: 38% !important;
    }
</style>

<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-3 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <a href="" class="text-decoration-none">
                <img src="{{ asset('ClientCss/img/logoFooter.jpg') }}" alt="" style="height : 77px;margin-top:-4%">
            </a><br>
            <p>Explore kids and baby products galore at BabyHub.com, the Big Store for Little Ones.<br><br>
                We at BabyHub.com
                empathize with you as a mother who always aspires to bestow her newborn, infant, baby or kid with the
                best things even for their smallest needs.</p>

        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="{{ route('Findex') }}"><i
                                class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-dark mb-2" href="{{ route('Fshop') }}"><i class="fa fa-angle-right mr-2"></i>Our
                            Shop</a>
                        <a class="text-dark mb-2" href="{{ route('Fdetails') }}"><i
                                class="fa fa-angle-right mr-2"></i>Shop
                            Detail</a>
                        <a class="text-dark mb-2" href="{{ route('Fcart') }}"><i
                                class="fa fa-angle-right mr-2"></i>Shopping
                            Cart</a>
                        <a class="text-dark mb-2" href="{{ route('Fcheckout') }}"><i
                                class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-dark" href="{{ route('Fcontact') }}"><i
                                class="fa fa-angle-right mr-2"></i>Contact
                            Us</a>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                    <form action="{{route('Subscribe')}}">
                        <div class="form-group">
                            <input type="text" class="form-control border-0 py-4" name="name" placeholder="Your Name"
                               />
                                <span class="text-danger">
                                    @error('name')
                                        {{$message}}
                                    @enderror
                                </span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-0 py-4" name="email" placeholder="Your Email"
                                />
                                <span class="text-danger">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </span>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe
                                Now</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <h5 class="font-weight-bold text-dark mb-4">Gallary</h5>
                    <div class="row gallery">
                        <div class="col-6">
                            <a href="#"><img src="{{asset('ClientCss/img/cloths/gsets1.jpg')}}" alt="Image"
                                    class="footer-img-fluid"></a>
                            <a href="#"><img src="{{asset('ClientCss\img\cloths\gjeans3.jpg')}}" alt="Image"
                                    class="footer-img-fluid"></a>
                        </div>
                        <div class="col-6">
                            <a href="#"><img src="{{asset('ClientCss\img\cloths\bjeans1.jpg')}}" alt="Image"
                                    class="footer-img-fluid"></a>
                            <a href="#"><img src="{{asset('ClientCss\img\cloths\bshirts3.jpg')}}" alt="Image"
                                    class="footer-img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer End -->
