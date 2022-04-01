<!DOCTYPE html>
<html lang="en">
<head>
    <title>COM-Education</title>
    <meta charset="UTF-8">
    <meta name="description" content="Academica Learning Page Template">
    <meta name="keywords" content="academica, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800"
          rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    {{--<!-- bootstrap theme -->--}}
    <link href="{{ asset('css/admin/bootstrap-theme.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css" href="{{config('static.static')}}/font-awesome/4.2.0/css/font-awesome.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{config('static.static')}}/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{config('static.static')}}/css/font-awesome.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{config('static.static')}}/css/flaticon.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{config('static.static')}}/css/owl.carousel.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{config('static.static')}}/css/style.css">--}}
    @yield('head')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="preloder">
    <div class="loader"></div>
</div>

@include('includes.header')

@yield('content')

@include('includes.footer')


<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
{{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/circle-progress.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@yield('scripts')
</body>
</html>
