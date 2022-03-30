@extends('custom.admin.layouts.app')

@section('content')

    <body>

    <section id="container" class="">

        <section id="main-content">

            <section class="wrapper">

                @include('custom.admin.profile_components.breadcrumbs')

                @include('custom.admin.profile_components.owninformation')

                @include('custom.admin.profile_components.addpanel')

            </section>

            @include('custom.admin.dashboard_components.licensetext')

        </section>

    </section>

    </body>

@endsection