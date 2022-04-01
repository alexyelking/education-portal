@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}" >

    <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="hero-text text-white">
                    <h3>@lang('content.edstep'): {{ $textBlock->position + 1}}</h3>
                </div>
            </div>
        </div>


    <form class="contact-form" action="{{ route('textBlock.update', [$lesson->id, $textBlock->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}
        <div class="row justify-content-center">

                <div class="col-md-7">
                        <textarea class="form-control" id="content" name="content"
                        required>{{$textBlock->content ?? ""}}</textarea>
                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                    <input type="hidden" name="position" value="{{ $textBlock->position }}">
                </div>

            <div class="col-md-7" >
                <button class = "site-btn col-md-4" type="submit" value="update">@lang('content.update')<i class="fa fa-angle-right"></i></button>
            </div>

        </div>
    </form>
    <br>


</section>



@endsection
