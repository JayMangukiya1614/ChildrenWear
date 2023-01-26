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
        <form action="Admin-Product-Save" method="POST" enctype="multipart/form-data" style="border: none"
            id="image-upload" class="dropzone dz-clickable">
            @csrf
            <div class="row ">

                <div class="col-md-12">
                    <div class="row">


                        <div class="col-md-4">
                            <label class="mt-5" for="AD_ID">Admin Id</label>
                            <input name="AD_ID" value="{{ old('AD_ID') }}" id="AD_ID"
                                class="form-control shadow-lg bg-white" type="text">
                            <span class="text-danger">
                                @error('AD_ID')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="mt-5" for="shopname">Shop Name</label>
                            <input name="shopname" value="{{ old('shopname') }}" id="shopname"type="text"
                                class="shadow-lg bg-white form-control">
                            <span class="text-danger">
                                @error('shopname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
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
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="">Gender</label> <span class="text-info">Press Control To
                                Select Value</span>
                            <select name="gender[]" multiple="multiple" value="{{ old('gender') }}"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span class="text-danger">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="">Age</label>
                            <select name="age[]" value="{{ old('age') }}" multiple="multiple"
                                class="form-control shadow-lg bg-white rounded-3" id="">
                                <option value="0-6(Months)">0-6(Months) </option>
                                <option value="6-24(Months)">6-24(Months)</option>
                                <option value="2-4(Year)">2-4(Year)</option>
                                <option value="4-6(Year)">4-6(Year)</option>
                                <option value="6-8(Year)">6-8(Year)</option>
                                <option value="8-10(Year)">8-10(Year)</option>
                                <option value="10-12(Year)">10-12(Year)</option>
                            </select>
                            <span class="text-danger">
                                @error('age')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-4" for="state">State</label>
                            <select name="state[]" multiple="multiple" value="{{ old('state') }}"
                                class="form-control  shadow-lg bg-white rounded-3" name="state" id="">
                                <option value="Goa">Goa</option>
                                <option value="Gujrat">Gujrat</option>
                                <option value="Kerala">Kerala</option>
                            </select>
                            <span class="text-danger">
                                @error('state')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-4" for="City">City</label>
                            <select name="city[]" multiple="multiple" value="{{ old('city') }}"
                                class="form-control  shadow-lg bg-white rounded-3" id="city">
                                <option value="Delhi">Delhi</option>
                                <option value="Bombay">Bombay</option>
                                <option value="Banglore">Banglore</option>
                            </select>
                            <span class="text-danger">
                                @error('city')
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
                                <option selected value="instock">InStock</option>
                                <option value="outofstock">OutOfStock</option>
                            </select>
                            <span class="text-danger">
                                @error('stock')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>                        
                        <div class="col-md-6">
                            <label class="mt-4" for="description">Description</label>
                            <input name="description" id="description" class="form-control shadow-lg bg-white rounded-3" type="text"{{ old('description') }}/>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-md-4">
                            <label class="mt-5" for="price">Product Price</label>
                            <input name="price" value="{{ old('price') }}" id="price"
                                class="form-control shadow-lg bg-white" type="text">
                            <span class="text-danger">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="mt-5" for="shopname">Shop Name</label>
                            <input name="shopname" value="{{ old('shopname') }}" id="shopname"type="text"
                                class="shadow-lg bg-white form-control">
                            <span class="text-danger">
                                @error('shopname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label class="mt-5" for="discount">Discount</label>
                            <input name="discount" value="{{ old('discount') }}" id="discount"type="text"
                                class="shadow-lg bg-white form-control">
                            <span class="text-danger">
                                @error('discount')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="mt-5" for="Pselling">Product Selling Price</label>
                            <textarea name="Pselling" id="Pselling" class="form-control shadow-lg bg-white rounded-3" type="text">{{ old('Ldescription') }}</textarea>
                            <span class="text-danger">
                                @error('Pselling')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <input type="file" name="profileimage[]" multiple="multiple">
                                    </div>
                                </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
        integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            Dropzone.options.imageUpload = {
                maxFilesize         :       1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif"
            };
    </script>
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

    @if (Session::has('message'))
        <script>
            swal("Great Job!", "{!! Session::get('message') !!}", "info", {
                button: "OK"
            })
        </script>
    @endif
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@endsection
