<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <style>
        body {
            background: #EDF1FF
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(123, 118, 125);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            color: black;
            background: #EDF1FF
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #e4cfe7;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
    <title>Admin Profile</title>
</head>

<body>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column aligan-items-center text-center p-3 py-5"><img
                        class="rounded-circle mt-5" width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">Edogaru</span><span
                        class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Details</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels"> Full Name</label><input type="text"
                                class="form-control" value=""></div>
                        {{-- <div class="col-md-6"><label class="labels">Surname</label><input type="text"
                                class="form-control" value="" placeholder="surname"></div> --}}
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                class="form-control" value=""></div>
                        <div class="col-md-12"><label class="labels">Age</label><input type="number"
                                class="form-control" value=""></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                class="form-control" value=""></div>
                        <div class="col-md-12"><label class="labels">ZipCode</label><input type="text"
                                class="form-control" value=""></div>
                        <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                class="form-control" value=""></div>
                        <div class="col-md-6"><label class="labels">City</label><input type="text"
                                class="form-control" value=""></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text"
                                class="form-control" disabled value=""></div>
                    </div>

                
                </div>
            </div>
            <div class="col-md-4">
                <div class=" py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Bank
                            Details</span></div><br>
                    <div class="col-md-12">
                        <label class="labels ">Bank Name</label>
                        <input type="text"class="form-control " disabled="false" value="">
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="labels">Branch</label>
                        <input type="text" class="form-control " disabled="false" value="">
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="labels">IFSC Code</label>
                        <input type="text" class="form-control " disabled="false" value="">
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="labels">GST No.</label>
                        <input type="text" class="form-control "disabled="false" value="">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="mt-5 float-right"><button class="btn btn-primary profile-button" type="button">Save
                        Profile</button></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
