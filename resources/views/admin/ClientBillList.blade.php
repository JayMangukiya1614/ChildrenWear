@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')
<style>
    .clicked {
        color: red;
    }
</style>
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')

@endsection

@section('content')



    <form action="{{ route('Client-Bill-List') }}" method="gget">

        <input name="date" type="date" max="<?= date('Y-m-d'); ?>">
        <button type="submit"> submit</button>
    </form>
    <div>
        <h1 class="text-center" style="margin-top: 2rem;font-size:2.5rem">Client Order Bill </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <h1 style="font-size:1.5rem">{{ $session->AD_ID }}</h1>
                    </div>
                    <div class="col-md-6">
                        <p>Date:- {{ $date }}</p>
                        @php
                            $order = count($data);
                        @endphp
                        <span> Order:- {{ $order }}</span>

                        <h1 style="float:right;font-size:1.5rem">{{ $session->shopname }}</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">PI_ID</th>
                    <th scope="col">OI_ID</th>
                    <th scope="col">CI_ID</th>
                    <th scope="col">Size</th>
                    <th scope="col">Color</th>
                    <th scope="col">Age</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Selling</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-wrap"style="max-width:100px;"><img width="90px" height="90px"
                                    src="{{ !empty($data->products->productimage) ? url('ProductImages/' . $data->products->productimage) : url('images/default.jpeg') }}">
                            </td>
                            <td>{{ $data->product_id }}</td>

                            <td>{{ $data->OI_ID }}</td>

                            <td>{{ $data->CI_ID }}</td>
                            <td>{{ $data->size }}</td>
                            <td>{{ $data->color }}</td>
                            <td>{{ $data->age }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->products->selling }}</td>
                            <td><a href="{{ route('pdf', $data->OI_ID) }}" id="download"><i
                                        class="fa-solid fa-download"></i></a></td>
                        </tr>
                    @endforeach
                @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> Data Not Found ...</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                @endif
            </tbody>
        </table>
    </div>
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#download').click(function() {
                alert('dds')
                $(this).toggleClass('clicked');

            })
        });
    </script>
@endsection
@endsection
