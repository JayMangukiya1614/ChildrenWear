@extends('layouts/contentNavbarLayout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css"
    integrity="sha512-WvVX1YO12zmsvTpUQV8s7ZU98DnkaAokcciMZJfnNWyNzm7//QRV61t4aEr0WdIa4pe854QHLTV302vH92FSMw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .image {
        width: 200px !important;
        height: 200px;
    }
</style>

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection



@section('content')



    <div class="container rounded-2 shadow-lg bg-white mb-2 form-group mt-3 p-4 mb-3">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-shadow: 2px 2px #EDF1FF;" class="text-center text-dark  shadow-lg bg-white p-4 border">
                    <i> <b> ..Baby..🧸 ..Product..Listing.. </b> </i>
                </h3>
            </div>
        </div>
        <form action="{{ route('Admin-Product-Listing-Update', $data->id) }}" method="POST" enctype="multipart/form-data"
            style="border: none">
            @csrf
            <div class="row ">

                <div class="col-md-12">
                    <div class="row">


                        <div class="col-md-4">
                            <label class="mt-5" for="AD_ID">Admin Id</label>
                            <input name="AD_ID" value="{{ $data->AD_ID }}" readonly id="AD_ID"
                                class="form-control shadow-lg bg-white" type="text">
                            <span class="text-danger">
                                @error('AD_ID')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="mt-5" for="shopname">Shop Name</label>
                            <input name="shopname" value="{{ $data->shopname }}" id="shopname"type="text"
                                class="shadow-lg bg-white form-control">
                            <span class="text-danger">
                                @error('shopname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="">Category</label>
                            <select name="category" value="{{ old('category') }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option {{ $data->gender == '1' ? 'selected' : '' }} value="1">Boy Fashion</option>
                                <option {{ $data->gender == '2' ? 'selected' : '' }}value="2">Girl Fashion</option>
                            </select>
                            <span class="text-danger">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <label class="mt-5" for="productname">Product Name</label>
                                <input name="productname" value="{{ $data->productname }}" id="productname"type="text"
                                    class="shadow-lg bg-white form-control">
                                <span class="text-danger">
                                    @error('productname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="mt-5" for="price">Product Price</label>
                                <input name="price" min="1" value="{{ $data->price }}" id="price"
                                    class="form-control shadow-lg bg-white" type="text">
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="mt-5" for="discount">Discount</label>
                                <input name="discount" min="1" max="100" value="{{ $data->discount }}"
                                    id="discount"type="number" class="shadow-lg bg-white form-control">
                                <span class="text-danger">
                                    @error('discount')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mt-4" for="">Age</label>
                                <select name="age[]" value="{{ old('age[]') }}" multiple multiselect-search="true"
                                    multiselect-select-all="true"multiselect-max-items="7"
                                    class="form-control text-center shadow-lg bg-white rounded-3" id="">
                                    <option value="0-6(M)"
                                        {{ in_array('0-6(M)', json_decode($data['age'])) ? 'selected' : '' }}>
                                        0-6(Months) </option>
                                    <option value="6-24(M)"
                                        {{ in_array('6-24(M)', json_decode($data['age'])) ? 'selected' : '' }}>
                                        6-24(Months)</option>
                                    <option value="2-4(Y)"
                                        {{ in_array('2-4(Y)', json_decode($data['age'])) ? 'selected' : '' }}>2-4(Year)
                                    </option>
                                    <option value="4-6(Y)"
                                        {{ in_array('4-6(Y)', json_decode($data['age'])) ? 'selected' : '' }}>4-6(Year)
                                    </option>
                                    <option value="6-8(Y)"
                                        {{ in_array('6-8(Y)', json_decode($data['age'])) ? 'selected' : '' }}>6-8(Year)
                                    </option>
                                    <option value="8-10(Y)"
                                        {{ in_array('8-10(Y)', json_decode($data['age'])) ? 'selected' : '' }}>
                                        8-10(Year)
                                    </option>
                                    <option value="10-12(Y)"
                                        {{ in_array('10-12(Y)', json_decode($data['age'])) ? 'selected' : '' }}>
                                        10-12(Year)</option>
                                </select>
                                <span class="text-danger">
                                    @error('age')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            {{-- {{dd($data->size)}} --}}
                            <div class="col-md-6">
                                <label class="mt-4" for="">Size</label>
                                <select name="size[]" value="{{ old('size[]') }}" multiple multiselect-search="true"
                                    multiselect-select-all="true"multiselect-max-items="7"
                                    class="form-control text-center shadow-lg bg-white rounded-3" id="">
                                    <option value="XS"
                                        {{ in_array('XS', json_decode($data['size'])) ? 'selected' : '' }}>
                                        XS </option>
                                    <option {{ in_array('S', json_decode($data['size'])) ? 'selected' : '' }}
                                        value="S">S </option>
                                    <option {{ in_array('M', json_decode($data['size'])) ? 'selected' : '' }}
                                        value="M">M</option>
                                    <option {{ in_array('L', json_decode($data['size'])) ? 'selected' : '' }}
                                        value="L">L </option>
                                    <option {{ in_array('XL', json_decode($data['size'])) ? 'selected' : '' }}
                                        value="XL"> XL</option>

                                </select>
                                <span class="text-danger">
                                    @error('size')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <label class="mt-4" for="">Collection</label>
                                <select name="collection" value="{{ old('collection') }}"
                                    class="form-control  shadow-lg bg-white rounded-3" id="">
                                    <option class="text-center" selected value="" disabled>Boys Fashion</option>

                                    <option {{ $data->collection == 1 ? 'selected' : '' }} value="1"> Shirts
                                    </option>
                                    <option {{ $data->collection == 2 ? 'selected' : '' }} value="2">
                                        T-Shirts</option>
                                    <option {{ $data->collection == 3 ? 'selected' : '' }} value="3">
                                        Jeans And Trousers</option>
                                    <option {{ $data->collection == 4 ? 'selected' : '' }} value="4"> Sweatshirts
                                    </option>
                                    <option {{ $data->collection == 5 ? 'selected' : '' }} value="5"> Jackets
                                    </option>
                                    <option {{ $data->collection == 6 ? 'selected' : '' }} value="6"> Ethnic Wear
                                    </option>
                                    <option class="text-center" value="" disabled>Girls Fashion</option>
                                    <option {{ $data->collection == 7 ? 'selected' : '' }} value="7"> Sets And Suits
                                    </option>
                                    <option {{ $data->collection == 8 ? 'selected' : '' }} value="8"> Tops And
                                        T-Shirts</option>
                                    <option {{ $data->collection == 9 ? 'selected' : '' }} value="9"> Jeans And
                                        Jeggings</option>
                                    <option {{ $data->collection == 10 ? 'selected' : '' }} value="10"> Jumpsuit And
                                        Dungarees</option>
                                    <option {{ $data->collection == 11 ? 'selected' : '' }} value="11"> Jackets
                                    </option>
                                    <option {{ $data->collection == 12 ? 'selected' : '' }} value="12"> Ethnic Wear
                                    </option>

                                </select>
                                <span class="text-danger">
                                    @error('collection')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-4" for="">Color</label>
                                <select name="color[]" value="{{ old('color[]') }}" multiple multiselect-search="true"
                                    multiselect-select-all="true"multiselect-max-items="5"
                                    class="form-control text-center shadow-lg bg-white rounded-3" id="">
                                    <option {{ in_array('Black', json_decode($data['color'])) ? 'selected' : '' }}
                                        value="Black">Black</option>
                                    <option {{ in_array('White', json_decode($data['color'])) ? 'selected' : '' }}
                                        value="White">White</option>
                                    <option {{ in_array('Red', json_decode($data['color'])) ? 'selected' : '' }}
                                        value="Red">Red</option>
                                    <option {{ in_array('Blue', json_decode($data['color'])) ? 'selected' : '' }}
                                        value="Blue">
                                        Blue</option>
                                    <option {{ in_array('Green', json_decode($data['color'])) ? 'selected' : '' }}
                                        value="Green">
                                        Green</option>
                                </select>
                                <span class="text-danger">
                                    @error('color')
                                        {{ $message }}
                                    @enderror
                                </span>


                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="">Stock</label>
                            <select name="stock" value="{{ old('stock') }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option {{ $data->stock == '1' ? 'selected' : '' }} value="1">InStock</option>
                                <option {{ $data->stock == '2' ? 'selected' : '' }} value="2">OutOfStock
                                </option>
                            </select>
                            <span class="text-danger">
                                @error('stock')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="description">Short Description</label>
                            <input name="description" id="description" class="form-control shadow-lg bg-white rounded-3"
                                type="text" value="{{ $data->description }}" />
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <label class="mt-5" for="Ldescription"> Long Description</label>
                            <textarea name="Ldescription" id="Ldescription" class="form-control shadow-lg bg-white rounded-3" type="text">{{ $data->Ldescription }}</textarea>
                            <span class="text-danger">
                                @error('Ldescription')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <input type="file" name="productimage" value="{{ $data->productimage }}"> --}}
                                    <label for="file-input">
                                        <img id="previewImg" class="" width="150px"
                                            src="{{ !empty($data->productimage) ? url('ProductImages/' . $data->productimage) : url('images/default.jpeg') }}">
                                    </label>
                                    <input id="file-input" name="productimage" type="file"
                                        onchange="previewFile(this);" style="display: none" />
                                </div>
                            </div>
                            <span class="text-danger">
                                @error('productimage')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="reset"
                            class="btn btn-outline-warning shadow-lg  rounded-3 form-control mt-5">Reset</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" id="submit"
                            class="btn btn-outline-success shadow-lg  rounded-3 form-control mt-5">Update</button>
                    </div>
                </div>


            </div>
    </div>

    </div>
    </form>



@section('page-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script>
        // toastr.error('hello');
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }


        }
    </script>
    <script>
        @if (Session::has('Id'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Id') }}");
        @endif
        @if (Session::has('Description'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Description') }}");
        @endif
        @if (Session::has('LDescription'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('LDescription') }}");
        @endif
    </script>


@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@endsection
