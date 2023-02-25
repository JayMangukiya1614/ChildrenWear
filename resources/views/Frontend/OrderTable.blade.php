@extends('Frontend.Main.Master')

@section('FrontAdmin')

   <!-- Page Header Start -->
   <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Order Table</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ route('Findex') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">OrderTable</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


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
                @foreach ($data as $key => $data)
                @if ($data->token != 2)
                <tr>
                            {{-- {{dd($key)}} --}}
                            <td scope="row">{{ $key}}</td>
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


                            <td class="text-wrap"style="max-width:150px;">{{ $data->productname }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ (string) $data->price }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->discount }}%</td>
                            <td class="text-wrap"style="max-width:150px;">{{ (float) $data->selling }}</td>

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
 <script>
    @if (Session::has('Confirm'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Confirm') }}");
        @endif
 </script>

@endsection
