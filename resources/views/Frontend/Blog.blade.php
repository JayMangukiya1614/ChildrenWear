@extends('Frontend.Main.Master')

<title>Blog</title>
<link href="{{ asset('ClientCss\css\blog.css') }}" rel="stylesheet">


@section('FrontAdmin')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Blog</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Blog</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="ClientCss/img/blog/blog-1.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 16 February 2020</span>
                            <h5>What Curling Irons Are The Best Ones</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 21 February 2020</span>
                            <h5>Eternity Bands Do Last Forever</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 28 February 2020</span>
                            <h5>The Health Benefits Of Sunglasses</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-4.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 16 February 2020</span>
                            <h5>Aiming For Higher The Mastopexy</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-5.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 21 February 2020</span>
                            <h5>Wedding Rings A Gift For A Lifetime</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-6.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 28 February 2020</span>
                            <h5>The Different Methods Of Hair Removal</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-7.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 16 February 2020</span>
                            <h5>Hoop Earrings A Style From History</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-8.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 21 February 2020</span>
                            <h5>Lasik Eye Surgery Are You Ready</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-9.jpg"
                            style='background-image: url("ClientCss/img/blog/blog-1.jpg");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt=""> 28 February
                                2020</span>
                            <h5>Lasik Eye Surgery Are You Ready</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
