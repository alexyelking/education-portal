@extends('layouts.app')

@section('content')
    <!-- Warning section -->
    <section class="hero-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}">
    <section class="warning-section">
        <div class="container">
            <br><br><br><br><br><br><br><br><br>
            <div class="row justify-content-center">
                <a class="navbar-brand col-md-9" style="margin: 0" href="{{ route('home') }}">
                    <img src="{{ asset('img/404.png') }}" alt="" style="width: 900px; height: 700px">
                </a>
            </div>
            <br><br><br>
        </div>
    </section>
    <!-- Warning section end -->
    <br>
    </section>
@endsection
