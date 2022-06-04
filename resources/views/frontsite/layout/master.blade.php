<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BizNews @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}">
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>

@include('frontsite.layout.menu')




@yield('content');


@include('frontsite.layout.footer')


<!-- JavaScript Libraries -->
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>
</body>

</html>
