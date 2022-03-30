@extends('custom.admin.layouts.app')

@section('content')

    <body>

    <section id="container" class="">

        <section id="main-content">

            <section class="wrapper">

                @include('custom.admin.users_list_components.breadcrumbs')

                @include('custom.admin.users_list_components.table')

            </section>

            @include('custom.admin.dashboard_components.licensetext')

        </section>

    </section>

    </body>

@endsection