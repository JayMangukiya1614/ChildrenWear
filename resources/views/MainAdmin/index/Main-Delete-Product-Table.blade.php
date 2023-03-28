@extends('MainAdmin.Main.Master')

@section('FrontAdmin')
    <h1 class="text-center" style="margin-top: 6rem">Main Admin Delete Product  </h1>

    <div class="table-responsive">

        <table class="table table-striped">


            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">ProductImage</th>
                    <th scope="col">Token</th>
                    <th scope="col">Category</th>
                    <th scope="col">Admin Id</th>
                    <th scope="col">Stock</th>
                    <th scope="col">ProductName</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Selling Price</th>


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
                            <td>{{$data->token}}</td>
                            @if ($data->category == 1)
                            <td>Boy</i></td>
                            @else
                            <td>Girl</td>
                            @endif
                            <td>{{ $data->AD_ID }}</td>

                            @if ($data->stock == 1)
                                <td class="text-success">{{ $data->stock }}</td>
                            @else
                                <td class="text-danger">{{ $data->stock }}</td>
                            @endif
                            <td class="text-wrap"style="max-width:150px;"><textarea name="" disabled class="form-control" id="" cols="15" rows="2">{{ $data->productname }}</textarea></td>
                            <td class="text-wrap"style="max-width:150px;">{{ (string) $data->price }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->discount }}%</td>
                            <td class="text-wrap"style="max-width:150px;">{{ (float) $data->selling }}</td>


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
