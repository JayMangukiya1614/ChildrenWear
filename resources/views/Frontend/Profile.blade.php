@extends('Frontend.Main.Master')

@section('FrontAdmin')


    {{-- profile start --}}
    {{-- <section class="mt-4" style="background-color: #ffffff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;background: linear-gradient(to right bottom,#ffb8b4, #D19C97 )">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <div style="">
                                    <h5>Name</h5>
                                    <p>Web Designer</p>
                                </div>

                                <a href="" style="color: white;font-size:20px"><i class="far fa-edit"></i></a>
                                <a href="" style="color: white;font-size:20px"><i class="fa-solid fa-key ml-3"></i></a>
                                <a href="" style="color: white;font-size:20px"><i class="fa-solid fa-arrow-right-from-bracket ml-3"></i></a>
                            </div>
                            <div class="col-md-8" style="background-color:rgb(241, 241, 241 );">
                                <div class="card-body p-4">
                                    <h6>My Profile </h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row">
                                        <div class="col-8 mb-3">
                                            <h6>Name</h6>
                                            <p class="text-muted">info</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            {{-- <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div> --}}
                        {{-- </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>  --}}
    {{-- profile end  --}}


    {{-- edit profile start --}}

      <form action="{{ route('Fprofileupdatesave', $Edit->id) }}">
        <section class="" style="background-color: #ffffff;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-light"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background: linear-gradient(to right bottom,#D19C97, #D19C97 )">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                        alt="Avatar" class="img-fluid " style="width: 80px; margin-top:80%" />
                                    <p class="mt-4">{{ $Edit->FirstName }} {{ $Edit->LastName }}</p>
                                </div>
                                <div class="col-md-8"  style="background-color:rgb(241, 241, 241 );border-radius:5px">
                                    <div class="card-body p-4" style="background:color: rgb(241, 241, 241)">
                                        <h6>Edit Profile</h6>
                                        <hr class="mt-0 mb-4">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0">First Name</label>
                                                <input type="text" style="border-radius: 5px" name="firstname" value="{{ $Edit->FirstName }}"
                                                    class="form-control mb-3" id="exampleInputfname" placeholder="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0">Last Name</label>
                                                <input type="text" style="border-radius: 5px" name="lastname" value="{{ $Edit->LastName }}"
                                                    class="form-control mb-3" id="exampleInputlname" placeholder="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0">Address</label>
                                                <input type="text" style="border-radius: 5px" name="address" value="{{ $Edit->Address }}"
                                                    class="form-control mb-3" id="exampleInputemail" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size: 15px;" class="mb-0">Phone No</label>
                                                <input type="text" style="border-radius: 5px" name="phoneno" value="{{ $Edit->PhoneNo }}"
                                                    class="form-control mb-3" id="exampleInputphoneno" placeholder="">
                                            </div>
                                        </div>

                                        <hr class="mt-0 mb-4">

                                    <div class="row">
                                        <div class="col-md-12" >
                                            <button type="submit" href="" class="btn waves-effect text-dark float-right"
                                                style="background-color: #D19C97;border-radius: 5px;width:80px">Edit</button>
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
@endsection
