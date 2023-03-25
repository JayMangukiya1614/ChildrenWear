@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')
<style>
    .clicked {
        color: red;
    }
</style>
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <style>
        .search {
            width: 13rem;
            margin-left: auto;
            padding: 7px;
            margin-right: 0.5rem;
        }
    </style>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')

@endsection

@section('content')




    <div>
        <h1 class="text-center" style="margin-top: 2rem;font-size:2.5rem">Client Order Bill </h1>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h1 style="font-size:1.5rem">{{ $session->AD_ID }}</h1>
                    </div>
                    <div class="col-md-6" style="text-align: right">
                        <h1 style="font-size:1.5rem">{{ $session->shopname }}</h1>
                        <div style="margin-right: 1em!important">
                            @php
                                $order = count($data);
                            @endphp
                            <span> Order:- {{ $order }}</span>
                            <p>Date:- {{ $date }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('Client-Bill-List') }}" method="get">
            <div class="input-group">
                <input name="date" max="<?= date('Y-m-d') ?>" class=" d-inline-block search rounded ml-auto"
                    type="date">
                <button type="submit" class="btn btn-outline-success"> Submit</button>
            </div>
        </form>
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
                            <td><a href="{{ route('pdf', $data->OI_ID) }}" id="download"><i><a
                                            href="{{ route('pdf', $data->OI_ID) }}" id="download"><i
                                                class="fa-solid fa-download"></i></a></>
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
