@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}" >
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h2>@lang('content.step'): {{ $textBlock->position }} (@lang('content.txt'))</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9 col-sm-9" style="color:white">
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
                        <div class="container col-md-10">
                                <pre class="card-text">{{ $textBlock->content}}</pre>
                        </div>
                        <form  class="col-md-2" onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                            action="{{ route('textBlock.destroy', [$lesson->id, $textBlock->id]) }}" method="post">
                            <input type="hidden" name="_method" value="Delete">
                            {{ csrf_field() }}
                            <a href="{{ route('textBlock.edit',[$lesson->id, $textBlock->id]) }}" class="site-btn-hollow col-md-12">@lang('content.edit')</a>
                            <button type="submit" class="site-btn-danger-sm col-md-12">@lang('content.del')</button>
                        </form>
                </div>
            </div>
            <br>

    </div>
</section>
@endsection
