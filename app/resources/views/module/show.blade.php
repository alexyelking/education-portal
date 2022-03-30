@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h2>@lang('content.module'): {{ $module->name }}</h2>
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
                    <div class="container">
                        @foreach($lessons as $lesson)
                            <div class="row justify-content-left" style="background-color:lightgrey">
                                <div class="col-md-12" style="color:green">
                                    <strong>{{ $lesson->title }}</strong>
                                    <br>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    {{-- <form  onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                        action="{{ route('module.destroy', [$module, $lesson->id]) }}" method="post">
                        <input type="hidden" name="_method" value="Delete">
                        {{ csrf_field() }}
                        <a href="{{ route('module.edit',[$module, $lesson->id]) }}" class="site-btn col-md-4">@lang('content.edles')</a>
                        <button type="submit" class="site-btn-danger col-md-4">@lang('content.delles')</button>
                    </form> --}}

                </div>
            </div>

    </div>
</section>
@endsection
