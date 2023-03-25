<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <h2>Welcome To Baby Hub </h2>
            <a href="http://127.0.0.1:8000/Forget-Password">Click Here To Forget Your  Password</a>
            <p>Varification code is {{$details['otp']}}</p>
            {{-- <p> Your Admin ID is <span></span> {{ $details['AD_ID'] }}</p> --}}
            {{-- <p>Forget Your Password</p> --}}
        </div>
    </div>



</body>

</html>
