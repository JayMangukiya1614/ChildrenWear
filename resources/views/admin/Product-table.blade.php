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
                    <th scope="col">Admin Id</th>
                    <th scope="col">Shopname</th>
                    <th scope="col">Produvt Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Selling </th>
                    <th scope="col">Action</th>
                    @foreach ($data as $productimage )

                    <th scope="col">ProductImage</th>
                    @endforeach
                    


                </tr>
            </thead>
            <tbody>
                @if ($data != null)
                    @foreach ($data as $key => $data)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            <td>{{ $data->AD_ID }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->shopname }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->productname }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->price }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->discount }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->Pselling }}</td>
                            
                            <td class="float-right"><a href="{{ route('Admin-Product-Listing-show', $data->id) }}"
                                class="btn btn-info">Show</a></td>
                                @foreach ($data as $productimage )
                                <td class="text-wrap"style="max-width:150px;"><img width="100px" height="100px"
                                    src="{{ !empty($productimage->productimage) ? url('images/' . $productimage->productimage) : url('images/default.jpeg') }}">
                                </td>
                                @endforeach

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
