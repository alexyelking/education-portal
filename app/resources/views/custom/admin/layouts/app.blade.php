<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link href="{{ config('static.static') }}/img/favicon.ico" rel="shortcut icon"/>

    <title>@lang('content.admdash')</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ asset('css/admin/bootstrap-theme.css') }}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{ asset('css/admin/elegant-icons-style.css' )}}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/font-awesome.min.css') }}" rel="stylesheet"/>
    <!-- full calendar css-->
    <link href="{{ asset('css/admin/bootstrap-fullcalendar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/fullcalendar2.css') }}" rel="stylesheet"/>
    <!-- easy pie chart-->
    <link href="{{ asset('css/admin/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
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
    @yield('head')
</head>

<body>
<div id="preloder">
    <div class="loader"></div>
</div>

@include('custom.admin.includes.header')
@include('custom.admin.includes.sidebar')

<main class="py-0">
    @yield('content')
</main>

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
<
<script src="{{ asset('js/admin/fullcalendar.min.js') }}"></script>
<!-- Full Google Calendar - Calendar -->
<script src="{{ asset('js/admin/fullcalendar2.js') }}"></script>
<!--script for this page only-->
<script src="{{ asset('js/admin/calendar-custom.js') }}"></script>
<script src="{{ asset('js/admin/jquery.rateit.min.js') }}"></script>
<!-- custom select -->
<script src="{{ asset('js/admin/jquery.customSelect.min.js') }}"></script>
<script src="{{ asset('js/admin/Chart2.js') }}"></script>

<!--custome script for all page-->
<script src="{{ asset('js/admin/scripts.js') }}"></script>
<!-- custom script for this page-->
<script src="{{ asset('js/admin/sparkline-chart.js') }}"></script>
<script src="{{ asset('js/admin/easy-pie-chart.js') }}"></script>
<script src="{{ asset('js/admin/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('js/admin/xcharts.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.placeholder.min.js') }}"></script>
<script src="{{ asset('js/admin/gdp-data.js') }}"></script>
<script src="{{ asset('js/admin/morris.min.js') }}"></script>
<script src="{{ asset('js/admin/sparklines.js') }}"></script>
<script src="{{ asset('js/admin/charts.js') }}"></script>
<script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}"></script>
<script>
    //knob
    $(function () {
        $(".knob").knob({
            'draw': function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function () {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function () {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function (e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
</script>
@yield('scripts')
</body>
</html>