<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admin-Log-In</title>
</head>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #EEE;
    }

    .clear {
        clear: both;
    }

    .log {
        width: 400px;
        margin: 5% auto;
        background-color: #FFF;
        padding: 30px 0;
    }

    .log h2 {
        text-align: center;
        color: #ed2553;
        font-weight: bold;
        font-size: 26px;
        margin-bottom: 50px;
    }

    .log .input-cont {
        position: relative;
        margin: 0 50px 60px;
    }

    .log .input-cont:last-of-type {
        margin-bottom: 30px;
    }

    .log .input-cont input {
        position: relative;
        z-index: 1;
        width: 100%;
        height: 40px;
        outline: none;
        color: #212121;
        font-size: 22px;
        font-weight: 400;
        background: none;
        border: none;
    }

    .log .input-cont input:focus {
        outline: none;
    }

    .log .input-cont label {
        position: absolute;
        color: #948c8c;
        top: 0;
        left: 0;
        line-height: 40px;
        -webkit-transition: .3s;
        -moz-transition: .3s;
        -o-transition: .3s;
        transition: .3s;
    }

    .log .input-cont input:focus+label {
        margin-top: -30px;
        -webkit-transform: scale(.8);
        -moz-transform: scale(.8);
        -o-transform: scale(.8);
        transform: scale(.8);
        color: #bdbdbd;
    }

    .log .border1,
    .log .border2 {
        position: absolute;
        height: 1px;
        background-color: #9E9E9E;
        left: 0;
        bottom: 0;
        width: 100%;
    }

    .log .border1::after,
    .log .border1::before,
    .log .border2::after,
    .log .border2::before {
        content: "";
        position: absolute;
        bottom: 0;
        width: 0;
        height: 2px;
        -webkit-transition: .5s;
        -moz-transition: .5s;
        -o-transition: .5s;
        transition: .5s;
    }

    .log .border1::after,
    .log .border2::after {

        right: 50%;
        background-color: #ed2553;
    }

    .log .border1::before,
    .log .border2::before {
        left: 50%;
        background-color: #ed2553;
    }

    .log .input-cont input:focus~.border1::after,
    .log .input-cont input:focus~.border1::before,
    .log .input-cont input:focus~.border2::after,
    .log .input-cont input:focus~.border2::before {
        width: 50%;
    }

    .log .check,
    .log a {
        float: left;
        width: calc(50% - 50px);
        display: block;
        font-size: 12px;
        margin-bottom: 30px;
    }

    .log .check {
        margin-left: 50px;
    }

    .log a {
        text-align: right;
        text-decoration: none;
        color: #ed2553;
    }

    .log a:hover {
        text-decoration: underline;
        color: #F00;
    }

    .log form input[type="submit"] {
        display: block;
        margin: 0 auto 20px;
        border: 2px solid transparent;
        padding: 5px 20px;
        font-size: 22px;
        cursor: pointer;
        color: #ed2553;
        -webkit-transition: .5s;
        -moz-transition: .5s;
        -o-transition: .5s;
        transition: .5s;
    }

    .log form input[type="submit"]:focus {
        outline: none;
    }

    .log form input[type="submit"]:hover {
        border: 2px solid #ed2553;
    }
</style>

<body>
    <div class="log">
        <h2>Welcome To Baby Hub</h2>
        <form>
            <div class="input-cont">
                <input type="text">
                <label>Username</label>
                <div class="border1"></div>
            </div>
            <div class="input-cont">
                <input type="password">
                <label>Password</label>
                <div class="border2"></div>
            </div>
            <span class="check">
                <input type="checkbox"> <label>Remember Me</label>
            </span>
            <a href="#">Forgot Password</a>
            <div class="clear"></div>
            <input type="submit" value="Sign In">
        </form>
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
