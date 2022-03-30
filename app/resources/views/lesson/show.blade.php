@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h2>@lang('content.lesson'): {{ $lesson->title }}</h2>
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
                    <div class="card-header" style="color:darkslategray">
                        <strong>{{ $lesson->excerpt }}</strong>
                    </div>

                    <div class="container">
                        <div class="row justify-content-left" style="background-color:lightgrey">
                            <div class="col-md-4" style="color:green">
                                <strong>{{ $lesson->likes }}</strong> @lang('content.uslikes')
                            </div>
                            <div class="col-md-4" style="color:crimson">
                                <strong>{{ $lesson->dislikes }}</strong> @lang('content.usdislikes')
                            </div>

                            <div class="col-md-4" style="color:dodgerblue">
                                @if($lesson->is_published)
                                    <strong>@lang('content.pubd')</strong>
                                @else
                                    @lang('content.npubd')
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <form  onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                        action="{{ route('lesson.destroy', [$module->id, $lesson->id]) }}" method="post">
                        <input type="hidden" name="_method" value="Delete">
                        {{ csrf_field() }}
                        <a href="{{ route('lesson.edit',[$module->id, $lesson->id]) }}" class="site-btn col-md-4">@lang('content.edles')</a>
                        <button type="submit" class="site-btn-danger col-md-4">@lang('content.delles')</button>
                    </form>

                </div>
            </div>

    </div>
</section>
@endsection
