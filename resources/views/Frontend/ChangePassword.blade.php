@extends('Frontend.Main.Master')

<title>Change Password</title>

@section('FrontAdmin')
    <form action="{{ route('Fchangepassword') }}">
        <section style="background-color: white">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body p-4" style="background-color: rgb(241, 241, 241 )">
                                        <h4 class="text-center mt-3 mb-4">Change Password</h4>
                                        <hr class="mt-0 mb-4">

                                        <div class="row">
                                            <div class="col-md-12 form-outline datepicker w-100">
                                                <label class="form-label mb-0" for="currentpass">Current Password</label>
                                                <span class="text-danger" style="font-size: 12px;margin-left:2%">
                                                    @error('currentpass')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                                <input type="password" style="border-radius: 5px" name="currentpass"
                                                    id="currentpass" class="form-control form-control-lg mb-3" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-outline datepicker w-100">
                                                <label class="form-label mb-0" for="newpass">New Password</label>
                                                <span class="text-danger" style="font-size: 12px;margin-left:2%">
                                                    @error('newpass')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                                <input type="password" style="border-radius: 5px" name="newpass"
                                                    id="newpass" class="form-control form-control-lg mb-3" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-outline datepicker w-100">
                                                <label for="confirmpass" class="form-label mb-0">Confirm Password</label>
                                                <span class="text-danger" style="font-size: 12px;margin-left:2%">
                                                    @error('confirmpass')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                                <input type="password" style="border-radius: 5px" name="confirmpass"
                                                    class="form-control form-control-lg mb-3" id="birthdayDate" />
                                            </div>
                                        </div>

                                        <hr class="mt-0 mb-4">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="reset" href="" style="border-radius: 5px"
                                                    class="btn  btn-outline-dark waves-effect  w-100">Cancel</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" href=""
                                                    class="btn waves-effect text-dark w-100"
                                                    style="background-color: #D19C97;border-radius:5px">Save</button>
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

    <script>

        @if (Session::has('NewPswdNMatch'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('NewPswdNMatch') }}");
        @endif

         @if (Session::has('CurrentPswdNMatch'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('CurrentPswdNMatch') }}");
        @endif
    </script>
@endsection
