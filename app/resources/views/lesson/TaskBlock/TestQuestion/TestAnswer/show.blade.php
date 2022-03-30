@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h2>@lang('content.tans'): {{$testQuestion->text}} </h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{-- <div class="container" style="background-color:darkgrey">
            <h3> {{ $lesson->excerpt }}</h3>
        </div>
        <br>
        <div class="container" style="background-color:white">
            <br>
            <h5> {{ $lesson->content_html }}</h5>
            <br>
        </div> --}}

        <div class="card col-md-10">
            <div class="card-body">
                <div class="card-header" style="color:darkslategray">
                    <strong><h3>@lang('content.anstext'):  {{ $testAnswer->text }}</h3></strong>
                </div>
                <br>
                <form  onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                    action="{{ route('testAnswer.destroy', [$testQuestion->id, $testAnswer->id]) }}" method="post">
                    <input type="hidden" name="_method" value="Delete">
                    {{ csrf_field() }}
                    <a href="{{ route('testAnswer.edit',[$testQuestion->id, $testAnswer->id]) }}" class="site-btn col-md-4">Edit</a>
                    <button type="submit" class="site-btn-danger col-md-4">@lang('content.del')</button>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
