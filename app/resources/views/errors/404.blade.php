@extends('layouts.app')

@section('content')
    <!-- Warning section -->
    {{--<section class="warning-section set-bg" data-setbg="{{config('static.static')}}/img/bg.jpg">--}}
    <section class="warning-section">
        <div class="container">
            <br><br><br><br><br><br><br><br><br><br>
            <div class="row justify-content-center">
                <img src="{{config('static.static')}}/img/errors/404.png" alt="">
            </div>
            <br><br><br>
        </div>
    </section>
    <!-- Warning section end -->
    <br>
@endsection