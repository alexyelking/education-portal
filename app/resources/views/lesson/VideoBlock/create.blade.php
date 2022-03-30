@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >

    <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="hero-text text-white">
                    <h3>@lang('content.addvb')</h3>
                </div>
            </div>
        </div>


    <form class="contact-form" action="{{ route('videoBlock.store', $lesson->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row justify-content-center">

                <div class="col-md-7">
                    <input type="text" maxlength="1024" name="link" placeholder="Place link to the video here"  required>
                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
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
