@extends('layouts/contentNavbarLayout')


@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection



@section('content')
    <h1 class="text-center" style="margin-top: 6rem">Main Admin Product Listing </h1>

    <div class="table-responsive">

        <table class="table table-striped">


            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">ProductImage</th>
                    <th scope="col">Category</th>
                    <th scope="col">Admin Id</th>

                    <th scope="col">Stock</th>
                    <th scope="col">ProductName</th>

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
                            <td><img width="90px" height="90px"
                                    src="{{ !empty($data->productimage) ? url('ProductImages/' . $data->productimage) : url('images/default.jpeg') }}">

                            </td>
                            @if ($data->category == 1)
                            <td><i class="fa-solid fa-child"></i></td>
                            @else
                            <td><i class="fa-solid fa-child-dress"></i></td>
                            @endif
                            <td>{{ $data->AD_ID }}</td>

                            @if ($data->stock == 1)
                                <td class="text-success">{{ $data->stock }}</td>
                            @else
                                <td class="text-danger">{{ $data->stock }}</td>
                            @endif
                            <td class="text-wrap"style="max-width:150px;">{{ $data->productname }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ (string) $data->price }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->discount }}%</td>
                            <td class="text-wrap"style="max-width:150px;">{{ (float) $data->selling }}</td>

                            <td class="text-wrap"style="max-width:200px;"><a
                                    href="{{ route('Main-Admin-Product-Listing-delete', $data->id) }}" class="btn btn-danger"><i
                                        class="fa-solid fa-trash"></i></a>
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
        @if (Session::has('Success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('Success') }}");
        @endif
    </script>

 
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@endsection
