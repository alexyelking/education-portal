@extends('layouts.app')

@section('content')

    <!-- Hero section -->
    @include('home_components.hero_section')
    <!-- Hero section end -->

    <!-- Services section -->
    @include('home_components.services_section')
    <!-- Services section end -->

    <!-- Courses section  -->
    @include('home_components.courses_section')
    <!-- Courses section end -->

    <!-- Fact section -->
    @include('home_components.fact_section')
    <!-- Fact section end -->

    <!-- About section -->
    @include('home_components.about_section')
    <!-- About section end -->

    <!-- Newslatter section -->
    @include('home_components.newslatter_section')
    <!-- Newslatter section end -->

    <!-- Contact section -->
    @include('home_components.contact_section')
    <!-- Contact section end -->

@endsection