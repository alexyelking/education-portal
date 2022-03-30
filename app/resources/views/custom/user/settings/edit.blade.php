@extends('layouts.app')

@section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword"
          content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link href="{{ config('static.static') }}/img/favicon.ico" rel="shortcut icon"/>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">
    <!-- font icon -->
    <link href="{{ asset('css/admin/elegant-icons-style.css' )}}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/font-awesome.min.css') }}" rel="stylesheet"/>
    <!-- full calendar css-->
    <link href="{{ asset('css/admin/bootstrap-fullcalendar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/fullcalendar2.css') }}" rel="stylesheet"/>
    <!-- easy pie chart-->
    <link href="{{ asset('css/admin/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css"
          media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('css/admin/owl.carousel.css') }}" type="text/css">
    <link href="{{ asset('css/admin/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/admin/fullcalendar.css') }}">
    <link href="{{ asset('css/admin/widgets.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/style-responsive.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/xcharts.min.css') }}" rel=" stylesheet">
    <link href="{{ asset('css/admin/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">

    <!-- bootstrap theme -->
{{--    <link href="{{ asset('css/admin/bootstrap-theme.css') }}" rel="stylesheet">--}}
@endsection

@section('content')
    <section class="content-section set-bg fixed"
             data-setbg="{{config('static.static')}}/img/bg.jpg">
        <div class="container" style="padding-top: 200px;">
            <div class="row">
                <section class="wrapper">
                    @include('custom.user.settings.settings_components.owninformation')
                    @include('custom.user.settings.settings_components.addpanel')
                </section>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <!-- javascripts -->
    <script src="{{ asset('js/admin/jquery.js') }}"></script>
    <script src="{{ asset('js/admin/jquery-ui-1.10.4.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery-1.8.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <!-- nice scroll -->
    <script src="{{ asset('js/admin/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="{{ asset('js/admin/jquery.knob.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('js/admin/owl.carousel.js') }}"></script>
    <!-- jQuery full calendar -->
    <script src="{{ asset('js/admin/fullcalendar.min.js') }}"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{ asset('js/admin/fullcalendar2.js') }}"></script>
    <!--script for this page only-->
    <script src="{{ asset('js/admin/calendar-custom.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.rateit.min.js') }}"></script>
    <!-- custom select -->
    <script src="{{ asset('js/admin/jquery.customSelect.min.js') }}"></script>
    <script src="{{ asset('js/admin/Chart2.js') }}"></script>

    <script>$("select[name='sex']").val({{$user->sex}}).change();</script>
@endsection

