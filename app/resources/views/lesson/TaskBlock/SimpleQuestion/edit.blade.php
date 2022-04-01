@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}" >

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h3>@lang('content.edsimpq') {{$taskBlock->position + 1}}</h3>
            </div>
        </div>
    </div>


    <form class="contact-form" action="{{ route('simpleQuestion.update', [$taskBlock->id, $simpleQuestion->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <input type="hidden" name="task_block_id" value="{{ $taskBlock->id }}">
        <input type="hidden" name="image_link" value="#">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <input type="text" maxlength="1024" name="text" value="{{$simpleQuestion->text}}" required>
                <input type="text" maxlength="1024" name="keywords" value="{{$simpleQuestion->keywords}}"  required>
            </div>
            <div class="col-md-7" >
                <button class = "site-btn col-md-4" type="submit" value="create">@lang('content.update')<i class="fa fa-angle-right"></i></button>
            </div>
        </div>
    </form>


    <br>
</section>



@endsection
