@extends('Frontend.Main.Master')

@section('FrontAdmin')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Order Details </h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
                <p class="m-0 px-2">-</p>

                <p class="m-0"> Order Details</p>

            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <ul>
        <li>
            <p style="display:contents "> Product image:-</p>
            <span class="text-wrap "style="max-width:100px;"><img width="100px"
                    height="100px"
                    src="{{ !empty($data->products->productimage) ? url('ProductImages/' . $data->products->productimage) : url('images/default.jpeg') }}">
            </span>
        </li>
        <li class="mt-3">
            <p style="display:contents "> Product Name:-</p>
            <span class="d-inline-block">{{ $data->products->productname }}</span>
        </li>

        <li class="mt-3">
            <p style="display:contents "> Product Color:-</p>
            <span class="d-inline-block">{{ $data->color }}</span>
        </li>
        <li class="mt-3">
            <p style="display:contents ">Product Size:-</p>
            <span class="d-inline-block">{{ $data->size }}</span>
        </li>
        <li class="mt-3">
            <p style="display:contents "> Age:-</p>
            <span class="d-inline-block">{{ $data->age }}</span>
        </li>

        <li class="mt-3">
            <p style="display:contents "> Description :-</p>
            <span class="d-inline-block">{{ $data->products->description }}</span>
        </li>

        <li class="mt-3">
            <p style="display:contents "> Long Description :-</p>
            <span class="d-inline-block">{{ $data->products->Ldescription }}</span>
        </li>
    </ul>



    </div>
    <script>
        @if (Session::has('Confirm'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('Confirm') }}");
        @endif
    </script>

   

@endsection
