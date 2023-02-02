@extends('layouts/contentNavbarLayout')

@section('title', 'Index -Table')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <style>
        .image {
            width: 300px !important;
            height: 300px;
        }
    </style>
@endsection
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th class="" scope="col">SubTitle</th>
            <th class=""scope="col">Heading-Image</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $data)
            <tr>
                <td scope="row">{{ $key + 1 }}</td>
                <td class="text-wrap"style="max-width:150px;">{{ $data->title }}</td>
                <td class="text-wrap"style="max-width:150px;">{{ $data->subtitle }}</td>
                <td><img width="100px" height="100px"
                        src="{{ !empty($data->image) ? url('Index/' . $data->image) : url('images/default.jpeg') }}">
                </td>
                <td><a class="btn btn-success" href="{{ route('Indexupdate', $data->id) }}">Update</a>
                    <a class="btn btn-danger" href="{{ route('Indexdelete', $data->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach


    </tbody>
</table>
{{-- @endsection --}}
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script>
    $(document).ready(function() {

        @if (Session::has('Delete'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('Delete') }}");
        @endif
        @if (Session::has('UpdateSave'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('UpdateSave') }}");
        @endif
    });
</script>
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
@endsection
