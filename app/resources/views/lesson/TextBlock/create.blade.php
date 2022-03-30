@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >

    <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="hero-text text-white">
                    <h3>@lang('content.addtb')</h3>
                </div>
            </div>
        </div>


    <form class="contact-form" action="{{ route('textBlock.store', $lesson->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row justify-content-center">

                <div class="col-md-7">
                    <textarea class="form-control" id="content" name="content"
                        required>"@lang('content.pct')"</textarea>
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
