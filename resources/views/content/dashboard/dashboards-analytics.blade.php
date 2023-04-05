@extends('layouts/contentNavbarLayout')
<title>Dashboard</title>
@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script>
        @if (Session::has('LoginSuccess'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('LoginSuccess') }}");
        @endif

        @if (Session::has('PasswordUpdate'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('PasswordUpdate') }}");
        @endif
    </script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')

    <h1>Dashboard</h1>

    <p></p>


@endsection
