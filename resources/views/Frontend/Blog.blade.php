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
                @foreach ($data    as  $data)

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" d
                        style='background-image: url("ClientCss/img/BlogImage/{{$data->image}}");'></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('ClientCss\img\blogicon\calendar.png') }}" alt="">{{$data->date}}</span>
                            <h5> {{ $data->title }}</h5>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
