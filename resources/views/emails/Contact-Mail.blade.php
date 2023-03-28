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
            <h3>Thank You For Contact Baby Hub</h3>

            <span class="mt-2 mb-2">Subject:-</span>
            <span class="mt-2 mb-2">{{ $details['subject'] }}</span>
            <br>
            <span class="mt-2 mb-2">Question:-</span>
            <span class="mt-2 mb-2">{{ $details['message'] }}</span>
            <br>

            <span class="mt-2 mb-2">Answer:-</span>
            <span class="mt-2 mb-2">{{ $details['reply'] }}</span>
          
            {{-- <p> Your Admin ID is <span></span> {{ $details['AD_ID'] }}</p> --}}
            {{-- <p>Forget Your Password</p> --}}
        </div>
    </div>



</body>

</html>
