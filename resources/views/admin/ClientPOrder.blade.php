@extends('layouts/contentNavbarLayout')


@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection


@section('content')

    <div>
        <h1 class="text-center" style="margin-top: 2rem;font-size:2.5rem">Pending Order </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <h1 style="font-size:1.5rem">{{ $Admin->AD_ID }}</h1>
                    </div>
                    <div class="col-md-6">
                        <h1 style="float:right;font-size:1.5rem">{{ $Admin->shopname }}</h1>
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

                    <th scope="col">OI_ID</th>
                    <th scope="col">Date</th>
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
                            <td>{{ $data->OI_ID }}</td>

                            <td>{{ $data->date }}</td>
                            <td>{{ $data->size }}</td>
                            <td>{{ $data->color }}</td>
                            <td>{{ $data->age }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->products->selling }}</td>
                            <td class="text-wrap"style="max-width:200px;"><a href="{{route('Admin-Order-Accepet',$data->id)}}" class="btn btn-info"><i
                                        class="fa-solid fa-check"></i></a>

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
