<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset('front/img/drama.png')}}">
    <title>Cosplay - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('back/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('back/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">

</head>
<style>
    @media screen and (min-width: 1200px) {
        .backImage{
            background: url('/homepage/images/register_bg.jpg') no-repeat center center fixed;-webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    }
    @media screen and (max-width: 1200px) {
        .backImage{
            background: url('/homepage/images/register_bg.jpg') ;
        }
    }
</style>
<body class="backImage">

<div class="container">

{{--    Content --}}
  @yield('content')

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('back/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('back/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('back/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
