@extends('layouts/contentNavbarLayout')


@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection



@section('content')
    <h1 class="text-center" style="margin-top: 6rem">Product Listing </h1>
    <div class="table-responsive">

        <table class="table table-striped">


            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">ProductImage</th>
                    <th scope="col">Admin Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">Shopname</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @if ($data != null)
                    @foreach ($data as $key => $data)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            <td class="text-wrap"style="max-width:150px;"><img width="100px" height="100px"
                                    src="{{ !empty($data->productimage) ? url('ProductImages/' . $data->productimage) : url('images/default.jpeg') }}">

                            </td>
                            <td>{{ $data->AD_ID }}</td>
                            @if ($data->category == 1)
                                <td>Boy Fashion</td>
                            @else
                                <td>Girl Fashion</td>
                            @endif

                            <td class="text-wrap"style="max-width:150px;">{{ $data->shopname }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->productname }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ (float)$data->price }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->discount }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ (float)$data->selling }}</td>

                            <td class="text-wrap"style="max-width:200px;"><a
                                    href="{{ route('Admin-Product-Listing-show', $data->id) }}"
                                    class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('Admin-Product-Listing-delete', $data->id) }}"
                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>

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

                @endif
            </tbody>
        </table>
    </div>
    


@section('page-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script>
        @if (Session::has('Update'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('Update') }}");
        @endif
    </script>

    @if (Session::has('Success'))
        <script>
            swal("Great Job!", "{!! Session::get('Success') !!}", "success", {
                button: "OK"
            })
        </script>
    @endif
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@endsection
