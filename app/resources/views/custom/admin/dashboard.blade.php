@extends('custom.admin.layouts.app')

@section('content')
    <body>
    <section id="container" class="">
        <section id="main-content">
            <section class="wrapper">
                @include('custom.admin.dashboard_components.breadcrumbs')

                @include('custom.admin.dashboard_components.statusbar')

                @include('custom.admin.dashboard_components.firstline')

                @include('custom.admin.dashboard_components.secondline')

                @include('custom.admin.dashboard_components.adminchat')

                @include('custom.admin.dashboard_components.calendar')

            </section>
            @include('custom.admin.dashboard_components.licensetext')
        </section>
    </section>
    </body>
@endsection