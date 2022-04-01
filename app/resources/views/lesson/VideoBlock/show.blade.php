@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}" >
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h2>@lang('content.step'): {{ $videoBlock->position + 1}} (@lang('content.vid'))</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 col-sm-9" style="color:white">
            {{-- <div class="container" style="background-color:darkgrey">
                <h3> {{ $lesson->excerpt }}</h3>
            </div>
            <br>
            <div class="container" style="background-color:white">
                <br>
                <h5> {{ $lesson->content_html }}</h5>
                <br>
            </div> --}}

            <div class="card">
                <div class="card-body">

                    <div style="text-align: center;">
                        <iframe width="100%" height="435"
                                src="{{ $videoBlock->link }}" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>

                    <br>
                    <form  onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                        action="{{ route('videoBlock.destroy', [$lesson->id, $videoBlock->id]) }}" method="post">
                        <input type="hidden" name="_method" value="Delete">
                        {{ csrf_field() }}
                        <a href="{{ route('videoBlock.edit',[$lesson->id, $videoBlock->id]) }}" class="site-btn-hollow col-md-4">@lang('content.edit')</a>
                        <button type="submit" class="site-btn-danger col-md-4">@lang('content.del')</button>
                    </form>

                </div>
            </div>

    </div>
</section>
@endsection
