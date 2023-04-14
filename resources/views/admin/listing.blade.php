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

@section('title', 'Product-Listing')

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
        <form action="{{ route('Admin-Product-Listing-Save') }}" method="POST" enctype="multipart/form-data"
            style="border: none">
            @csrf
            <div class="row ">

                <div class="col-md-12">
                    <div class="row">


                        <div class="col-md-4">
                            <label class="mt-5" for="AD_ID">Admin Id</label>
                            <input name="AD_ID" value="{{$sessionid->AD_ID}}" readonly id="AD_ID"
                                class="form-control shadow-lg bg-white" type="text">
                            <span class="text-danger">
                                @error('AD_ID')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="mt-5" for="shopname">Shop Name</label>
                            <input name="shopname" value="{{$sessionid->shopname}}" readonly id="shopname"type="text"
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
                                <option value="1">Boy Fashion</option>
                                <option value="2">Girl Fashion</option>
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
                                <input name="productname" value="{{ old('productname') }}" id="productname"type="text"
                                    class="shadow-lg bg-white form-control">
                                <span class="text-danger">
                                    @error('productname')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="mt-5" for="price">Product Price</label>
                                <input name="price" min="100" max="10000" value="{{ old('price') }}" id="price"
                                    class="form-control shadow-lg bg-white Price" type="number">
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="mt-5" for="discount">Discount</label>
                                <input name="discount" min="0" max="99" value="{{ old('discount') }}" id="discount"type="number"
                                    class="shadow-lg bg-white form-control">
                                <span class="text-danger">
                                    @error('discount')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label class="mt-4" for="age">Age</label>
                            <select name="age[]" value="{{ old('age[]') }}" multiple multiselect-search="true"
                                multiselect-select-all="true"multiselect-max-items="7"
                                class="form-control text-center shadow-lg bg-white rounded-3" id="age">
                                <option value="0-6(M)">0-6(Months) </option>
                                <option value="6-24(M)">6-24(Months)</option>
                                <option value="2-4(Y)">2-4(Year)</option>
                                <option value="4-6(Y)">4-6(Year)</option>
                                <option value="6-8(Y)">6-8(Year)</option>
                                <option value="8-10(Y)">8-10(Year)</option>
                                <option value="10-12(Y)">10-12(Year)</option>
                            </select>
                            <span class="text-danger">
                                @error('age')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="">Size</label>
                            <select name="size[]" value="{{ old('size[]') }}" multiple multiselect-search="true"
                                multiselect-select-all="true"multiselect-max-items="6"
                                class="form-control text-center shadow-lg bg-white rounded-3" id="">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>

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
                            <select name="collection" value="{{ old('collection') }}"  multiselect-search="true"
                                select-one="true"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option  class="text-center" selected value="" disabled>Boys Fashion</option>
                                <option selected value="1"> Shirts </option>
                                <option value="2">T-Shirts</option>
                                <option value="3">Jeans And Trousers</option>
                                <option value="4">Sweatshirts</option>
                                <option value="5">Jackets</option>
                                <option value="6">Ethnic Wear</option>

                                <option  class="text-center" value="" disabled>Girls Fashion</option>

                                <option value="7">Sets And Suits</option>
                                <option value="8">Tops And T-Shirts</option>
                                <option value="9">Jeans And Jeggings</option>
                                <option value="10">Jumpsuit And Dungarees</option>
                                <option value="11">Jackets</option>
                                <option value="12">Ethnic Wear</option>


                 

                            </select>
                            <span class="text-danger">
                                @error('collection')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="">Color</label>
                            <select name="color[]" class="shadow-lg bg-white form-control" value="{{ old('color[]') }}"
                                multiple multiselect-search="true" multiselect-select-all="true"multiselect-max-items="5"
                                class="form-control text-center shadow-lg bg-white rounded-3" id="">
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                                <option value="Red">Red</option>
                                <option value="Blue">Blue</option>
                                <option value="Green">Green</option>
                            </select>
                            <span class="text-danger">
                                @error('color')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="">Stock</label>
                            <select name="stock" value="{{ old('stock') }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option selected value="1">InStock</option>
                                <option value="2">OutOfStock</option>
                            </select>
                            <span class="text-danger">
                                @error('stock')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="description">Short Description</label>
                            <input name="description" min="100" max="10000" id="description" class="form-control shadow-lg bg-white rounded-3"
                                type="text" value="{{ old('description') }}" />
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
                            <textarea name="Ldescription" id="Ldescription" class="form-control shadow-lg bg-white rounded-3" type="text">{{ old('Ldescription') }}</textarea>
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
                                    <label for="file-input">
                                        <img id="previewImg" class="image " src="{{ asset('images/Pdefault.jpg') }}" />
                                    </label>
            
                                    <input id="file-input" name="productimage" type="file" onchange="previewFile(this);"
                                        style="display: none;" />
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