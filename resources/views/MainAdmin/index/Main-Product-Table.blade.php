@extends('MainAdmin.Main.Master')

<style>
  p{
    color:black !important;

  }
</style>

@section('FrontAdmin')
    <h1 class="text-center mb-3" style="margin-top: 6rem">Product Listing Table </h1>

    <div class="table-responsive">

        <table class="table table-striped">


            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">ProductImage</th>
                    <th scope="col">Category</th>
                    <th scope="col">Admin Name</th>

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
                                <td>Boy</td>
                            @else
                                <td>Girl</td>
                            @endif
                            <td>{{ $sessionid->firstname }} {{ $sessionid->lastname }}</td>

                            @if ($data->stock == 1)
                                <td class="text-success">{{ $data->stock }}</td>
                            @else
                                <td class="text-danger">{{ $data->stock }}</td>
                            @endif
                            <td class="text-wrap"style="max-width:150px;">
                                <textarea name="" class="form-control" id="" disabled cols="15" rows="2">{{ $data->productname }}</textarea>
                            </td>
                            <td class="text-wrap"style="max-width:150px;">{{ (string) $data->price }}</td>
                            <td class="text-wrap"style="max-width:150px;">{{ $data->discount }}%</td>
                            <td class="text-wrap"style="max-width:150px;">{{ (float) $data->selling }}</td>

                            <td class="text-wrap"style="max-width:200px;">
                                {{-- <a class="btn btn-info mr-2"
                                    href="{{ route('Main-Admin-Product-Details', $data->id) }}">Details</a> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info mr-2" onclick="showModel(this)"
                                    id="{{ $data->id }}">
                                    Details
                                </button>
                                <a href="{{ route('Main-Admin-Product-Listing-delete', $data->id) }}"
                                    class="btn btn-danger ">Delete</i></a>
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

    <div>
        {{-- {{ $data->links() }} --}}
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




    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Details of product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <img alt="Image not found" width="100%" class="rounded" id="modelImage">
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <ul>
                                    <li class="mt-1">
                                        <p style="display:contents "> Product Name:-</p>
                                        <span class="d-inline-block" id="productTitle"></span>
                                    </li>

                                    <li class="mt-1">
                                        <p style="display:contents "> Product Color:-</p>
                                        <span class="d-inline-block" id="productColor"></span>
                                    </li>
                                    <li class="mt-1">
                                        <p style="display:contents ">Product Size:-</p>
                                        <span class="d-inline-block" id="productSize"></span>
                                    </li>
                                    <li class="mt-1">
                                        <p style="display:contents "> Age:-</p>
                                        <span class="d-inline-block" id="productAge"></span>
                                    </li>

                                    <li class="mt-1">
                                        <p style="display:contents "> Description :-</p>
                                        <span class="d-inline-block"
                                            id="productDescription"></span>
                                    </li>

                                    <li class="mt-1">
                                        <p style="display:contents "> Long Description :-</p>
                                        <span class="d-inline-block"
                                            id="productLdescription"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModel(data) {
            // console.log(data);
            // $("#modal").modal("toggle");

            $.ajax({
                type: 'POST',
                url: `/Main-Admin-Product-Details/${data.id}`,
                data: {

                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {

                    $('#modelImage').attr('src',
                        `http://127.0.0.1:8000/ProductImages/${response.data['productimage']}`);

                    $('#productTitle').text(response.data['productname']);
                    $('#productColor').text(response.data['color']);
                    $('#productSize').text(response.data['size']);
                    $('#productAge').text(response.data['age']);
                    $('#productDescription').text(response.data['description']);
                    $('#productLdescription').text(response.data['Ldescription']);

                    $("#modal").modal("toggle");
                }
            })
        }
    </script>


@endsection
