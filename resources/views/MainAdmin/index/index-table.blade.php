@extends('MainAdmin.Main.Master')


@section('FrontAdmin')
<h1 class="text-center" style="margin-top: 6rem">Blog Table</h1>

<style>
    .image {
        width: 300px !important;
        height: 300px;
    }
</style>
    <table class="table table-striped" style="margin-top: 6rem;">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th class="" scope="col">Date</th>
                <th class=""scope="col">Heading-Image</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $data)
                <tr>
                    <td scope="row">{{ $key + 1 }}</td>
                    <td class="text-wrap"style="max-width:150px;">{{ $data->title }}</td>
                    <td class="text-wrap"style="max-width:150px;">{{ $data->date }}</td>
                    <td><img width="100px" height="100px"
                            src="{{ !empty($data->image) ? url('ClientCss/img/BlogImage/' . $data->image) : url('images/default.jpeg') }}">
                    </td>
                    <td><a class="btn btn-success" href="{{ route('Blogupdate', $data->id) }}">Update</a>
                        <a class="btn btn-danger" href="{{ route('Blogdelete', $data->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{-- @endsection --}}



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
@endsection
