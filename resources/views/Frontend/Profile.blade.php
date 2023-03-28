@extends('Frontend.Main.Master')

<title>My Profile</title>

@section('FrontAdmin')


    {{-- edit profile start --}}

      <form action="{{ route('FProfileUpdateSave', $Edit->id) }}">
        <section class="" style="background-color: #ffffff;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-light"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background: linear-gradient(to right bottom,#D19C97, #D19C97 )">
                                    {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                        alt="Avatar" class="img-fluid " style="width: 80px; margin-top:80%" /> --}}
                                    <p class="mt-4">{{ $Edit->FirstName }} {{ $Edit->LastName }}</p>
                                </div>
                                <div class="col-md-8"  style="background-color:rgb(241, 241, 241 );border-radius:5px">
                                    <div class="card-body p-4" style="background:color: rgb(241, 241, 241)">
                                        <h6>Edit Profile</h6>
                                        <hr class="mt-0 mb-4">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0">Client Id</label>
                                                <input type="text" style="border-radius: 5px" readonly name="CI_ID" value="{{ $Edit->CI_ID }}"
                                                    class="form-control " id="exampleInputfname" placeholder="">
                                                    <span class="text-danger">
                                                        @error('CI_ID')
                                                            {{$message}}
                                                        @enderror
                                                    </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0 mt-3">First Name</label>
                                                <input type="text" style="border-radius: 5px" name="firstname" value="{{ $Edit->FirstName }}"
                                                    class="form-control " id="exampleInputfname" placeholder="">
                                                    <span class="text-danger">
                                                        @error('firstname')
                                                            {{$message}}
                                                        @enderror
                                                    </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0 mt-3">Last Name</label>
                                                <input type="text" style="border-radius: 5px" name="lastname" value="{{ $Edit->LastName }}"
                                                    class="form-control " id="exampleInputlname" placeholder="">
                                                    <span class="text-danger">
                                                        @error('lastname')
                                                            {{$message}}
                                                        @enderror
                                                    </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0 mt-3">Address</label>
                                                <input type="text" style="border-radius: 5px" name="address" value="{{ $Edit->Address }}"
                                                    class=" form-control" id="exampleInputemail" placeholder="">
                                                    <span class="text-danger">
                                                        @error('address')
                                                            {{$message}}
                                                        @enderror
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0 mt-3">Phone No</label>
                                                <input type="text" style="border-radius: 5px" name="phoneno" value="{{ $Edit->PhoneNo }}"
                                                    class="form-control " id="exampleInputphoneno" placeholder="">
                                                    <span class="text-danger">
                                                        @error('phoneno')
                                                            {{$message}}
                                                        @enderror
                                                    </span>
                                            </div>
                                        </div>

                                        <hr class="mt-0 mb-4">

                                    <div class="row">
                                        <div class="col-md-12" >
                                            <button type="submit" href="" class=" mt-3btn waves-effect text-dark float-right"
                                                style="background-color: #D19C97;border-radius: 5px;width:80px;border-color:#D19C97">Edit</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    {{-- end edit profile --}}

    <script>
       @if (Session::has('PasswordUpdate'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('PasswordUpdate') }}");
        @endif

        @if (Session::has('Profile'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('Profile') }}");
        @endif
    </script>

@endsection
