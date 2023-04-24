@extends('MainAdmin.Main.Master')

@section('FrontAdmin')
<style>
    .image {
        width: 300px !important;
        height: 300px;
    }
</style>

<section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Add Blog Data
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Blogsave') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="title">Title:-</label>
                            <input type="text" id="title" name="title" class="form-control">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="file-input" class="mt-3">Heading Image</label>
                            <input id="file-input" class="form-control" name="image" type="file"/>
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="btn btn-info mt-3">Submit</button>
                        <a href="{{route('Blogtable')}}"class="btn btn-secondary float-right mt-3">Table View</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



<script>
    // toastr.success('s');
    $(document).ready(function() {

        @if (Session::has('Save'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('Save') }}");
        @endif
    });
</script>



@endsection