@extends('MainAdmin.Main.Master')

<style>
    .image {
        width: 300px !important;
        height: 300px;
    }
    </style>

@section('FrontAdmin')

    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Add Heading Data
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Blog-update-save', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="title">Title:-</label>
                                    <input type="text" value="{{ $data->title }}" id="title" name="title"
                                        class="form-control">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="file-input" class="mt-3">Heading Image</label>
                                    <input id="file-input" value="{{ $data->image }}" class="form-control"
                                        onchange="previewFile(this);" name="headingimage" type="file" />
                                    <img id="previewImg"
                                        class=""src="{{ asset('Headingimages') }}/{{ $data->image }}"
                                        style="display:none;" />
                                </div>
                                <button type="submit" class="btn btn-success mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script>
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
        $(document).ready(function() {

            @if (Session::has('Success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('Success') }}");
            @endif
        });
    </script>

@endsection
