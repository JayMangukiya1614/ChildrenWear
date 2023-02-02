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
                            <input name="shopname" value="{{ $data->shopname }}" readonly id="shopname"type="text"
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
                                <input name="price" value="{{ $data->price }}" id="price"
                                    class="form-control shadow-lg bg-white" type="text">
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="mt-5" for="discount">Discount</label>
                                <input name="discount" value="{{ $data->discount }}" id="discount"type="number"
                                    class="shadow-lg bg-white form-control">
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
                                <select name="age[]" value="{{ old('age') }}" multiple multiselect-search="true"
                                    multiselect-select-all="true"multiselect-max-items="7"
                                    class="form-control text-center shadow-lg bg-white rounded-3" id="">
                                    <option value="0-6(Months)"
                                        {{ in_array('0-6(Months)', json_decode($data['age'])) ? 'selected' : '' }}>
                                        0-6(Months) </option>
                                    <option value="6-24(Months)"
                                        {{ in_array('6-24(Months)', json_decode($data['age'])) ? 'selected' : '' }}>
                                        6-24(Months)</option>
                                    <option value="2-4(Year)"
                                        {{ in_array('2-4(Year)', json_decode($data['age'])) ? 'selected' : '' }}>2-4(Year)
                                    </option>
                                    <option value="4-6(Year)"
                                        {{ in_array('4-6(Year)', json_decode($data['age'])) ? 'selected' : '' }}>4-6(Year)
                                    </option>
                                    <option value="6-8(Year)"
                                        {{ in_array('6-8(Year)', json_decode($data['age'])) ? 'selected' : '' }}>6-8(Year)
                                    </option>
                                    <option value="8-10(Year)"
                                        {{ in_array('8-10(Year)', json_decode($data['age'])) ? 'selected' : '' }}>
                                        8-10(Year)
                                    </option>
                                    <option value="10-12(Year)"
                                        {{ in_array('10-12(Year)', json_decode($data['age'])) ? 'selected' : '' }}>
                                        10-12(Year)</option>
                                </select>
                                <span class="text-danger">
                                    @error('age')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            @php
                                $size = json_decode($data->size);
                                
                            @endphp

                            <div class="col-md-6">
                                <label class="mt-4" for="">Size</label>
                                <select name="size[]" value="{{ old('size') }}" multiple multiselect-search="true"
                                    multiselect-select-all="true"multiselect-max-items="5"
                                    class="form-control text-center shadow-lg bg-white rounded-3" id="">


                                    <option {{ in_array('XS', json_decode($data['size'])) ? 'selected' : '' }}
                                        value="XS">XS</option>
                                    <option {{ in_array('S', json_decode($data['size'])) ? 'selected' : '' }}value="S">S
                                    </option>
                                    <option {{ in_array('M', json_decode($data['size'])) ? 'selected' : '' }}
                                        value="M">M</option>
                                    <option {{ in_array('L', json_decode($data['size'])) ? 'selected' : '' }}value="L">L
                                    </option>
                                    <option {{ in_array('XL', json_decode($data['size'])) ? 'selected' : '' }}value="XL">
                                        XL</option>

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
                                <select name="collection[]" value="{{ old('collection') }}" multiple
                                    multiselect-search="true" multiselect-select-all="true"multiselect-max-items="9"
                                    class="form-control text-center shadow-lg bg-white rounded-3" id="">
                                    <option {{ in_array('Shirts', json_decode($data['collection'])) ? 'selected' : '' }}
                                        value="Shirts"> Shirts </option>
                                    <option
                                        {{ in_array('T-Shirts', json_decode($data['collection'])) ? 'selected' : '' }}value="T-Shirts">
                                        T-Shirts</option>
                                    <option
                                        {{ in_array('Jeans And Trousers', json_decode($data['collection'])) ? 'selected' : '' }}value="Jeans And Trousers">
                                        Jeans And Trousers</option>
                                    <option
                                        {{ in_array('Sweatshirts', json_decode($data['collection'])) ? 'selected' : '' }}value="Sweatshirts">
                                        Sweatshirts</option>
                                    <option
                                        {{ in_array('Jackets', json_decode($data['collection'])) ? 'selected' : '' }}value="Jackets">
                                        Jackets</option>
                                    <option
                                        {{ in_array('Sets And Suits', json_decode($data['collection'])) ? 'selected' : '' }}value="Sets And Suits">
                                        Sets And Suits</option>
                                    <option
                                        {{ in_array('Tops And T-Shirts', json_decode($data['collection'])) ? 'selected' : '' }}value="Tops And T-Shirts">
                                        Tops And T-Shirts</option>
                                    <option
                                        {{ in_array('Jeans And Jeggings', json_decode($data['collection'])) ? 'selected' : '' }}value="Jeans And Jeggings">
                                        Jeans And Jeggings</option>
                                    <option
                                        {{ in_array('Jumpsuit And Dungarees', json_decode($data['collection'])) ? 'selected' : '' }}value="Jumpsuit And Dungarees">
                                        Jumpsuit And Dungarees</option>
                                    <option
                                        {{ in_array('Ethnic Wear', json_decode($data['collection'])) ? 'selected' : '' }}value="Ethnic Wear">
                                        Ethnic Wear</option>

                                </select>
                                <span class="text-danger">
                                    @error('collection')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-4" for="">Color</label>
                                <select name="color[]" value="{{ old('color') }}" multiple multiselect-search="true"
                                    multiselect-select-all="true"multiselect-max-items="5"
                                    class="form-control text-center shadow-lg bg-white rounded-3" id="">
                                    <option {{ in_array('Black', json_decode($data['color'])) ? 'selected' : '' }}
                                        value="Black">Black</option>
                                    <option {{ in_array('White', json_decode($data['color'])) ? 'selected' : '' }}
                                        value="White">White</option>
                                    <option {{ in_array('Red', json_decode($data['color'])) ? 'selected' : '' }}
                                        value="Red">Red</option>
                                    <option
                                        {{ in_array('Blue', json_decode($data['color'])) ? 'selected' : '' }}value="Blue">
                                        Blue</option>
                                    <option
                                        {{ in_array('Green', json_decode($data['color'])) ? 'selected' : '' }}value="Green">
                                        Green</option>
                                </select>
                                <span class="text-danger">
                                    @error('color')
                                        {{ $message }}
                                    @enderror
                                </span>
                                {{-- {{dd($data->color)}} --}}

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="">Stock</label>
                            <select name="stock" value="{{ old('stock') }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option {{ $data->stock == 'instock' ? 'selected' : '' }} value="instock">InStock</option>
                                <option {{ $data->stock == 'outofstock' ? 'selected' : '' }} value="outofstock">OutOfStock
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
                                    <input type="file" name="productimage" value="{{ $data->productimage }}">
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
                            class="btn btn-outline-success shadow-lg  rounded-3 form-control mt-5">Register</button>
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
        @if (Session::has('Id'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Id') }}");
        @endif
    </script>


@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@endsection
