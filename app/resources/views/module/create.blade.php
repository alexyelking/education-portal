@extends('layouts.app')

@section('content')

<section class="module-section set-bgf fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >

    <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="hero-text text-white">
                    <h3>@lang('content.cmod')</h3>
                </div>
            </div>
        </div>


    <form class="contact-form" action="{{ route('module.store', $course->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row justify-content-center">

                <div class="col-md-7">
                    <input type="text" maxlength="64" name="name" placeholder="Module title"  required>
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="position" value = "0">
                </div>

            <div class="col-md-7" >
                <button class = "site-btn col-md-4" type="submit" value="create">@lang('content.create')<i class="fa fa-angle-right"></i></button>
            </div>

        </div>
    </form>
    <br>


</section>

@endsection
