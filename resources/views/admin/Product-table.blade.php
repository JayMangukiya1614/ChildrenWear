@extends('layouts/contentNavbarLayout')


@section('title', 'Dashboard - Analytics')

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


@section('content')

    <div>
        <h1 class="text-center" style="margin-top: 2rem;font-size:2.5rem">Product Listing </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <h1 style="font-size:1.5rem">{{ $heading->AD_ID }}</h1>
                    </div>
                    <div class="col-md-6">
                        <h1 style="float:right;font-size:1.5rem">{{ $heading->shopname }}</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <form action="">
        <div class="input-group">
            <input type="search" name="search" class="search rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" value="{{ $search }}" />
            <button type="submit" class="btn btn-outline-primary rounded d-inline-block" style="margin-right: 0.5rem;" >search</button>
            <a href="{{ url('Admin-Product-table') }}"><button type="button"
                    class="btn btn-outline-danger">Reset</button></a>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">ProductImage</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product_ID</th>

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
                    {{-- {{dd($data)}} --}}
                    @foreach ($data as $key => $data)
                        @if ($data->token != 2)
                            <tr>
                                {{-- {{dd($key)}} --}}
                                <td scope="row">{{ $key + 1 }}</td>
                                <td class="text-wrap"style="max-width:100px;"><img width="90px" height="90px"
                                        src="{{ !empty($data->productimage) ? url('ProductImages/' . $data->productimage) : url('images/default.jpeg') }}">
                                </td>
                                @if ($data->category == 1)
                                    <td><i class="fa-solid fa-child"></i></td>
                                @else
                                    <td><i class="fa-solid fa-child-dress"></i></td>
                                @endif
                                <td class="text-wrap"style="max-width:150px;">{{ $data->PI_ID }}</td>

                                @if ($data->stock == 1)
                                    <td class="text-success">{{ $data->stock }}</td>
                                @else
                                    <td class="text-danger">{{ $data->stock }}</td>
                                @endif


                                <td class="text-wrap"style=""><textarea name="" disabled class="form-control" id="" cols="15" rows="2">{{ $data->productname }}</textarea></td>
                                <td class="text-wrap"style="">{{ (string) $data->price }}</td>
                                <td class="text-wrap"style="">{{ $data->discount }}%</td>
                                <td class="text-wrap"style="">{{ (float) $data->selling }}</td>

                                <td class="text-wrap"style="max-width:200px;"><a
                                        href="{{ route('Admin-Product-Listing-show', $data->id) }}" class="btn btn-info"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('Admin-Product-Listing-delete', $data->id) }}"
                                        class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endif
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
    <div>
        {{-- {{$data->links()}} --}}
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
