@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h2>@lang('content.tb'): {{$taskBlock->position + 1}}</h2>
            </div>
        </div>
    </div>
    {{-- <div class="container" style="background-color:darkgrey">
        <h3> {{ $lesson->excerpt }}</h3>
    </div>
    <br>
    <div class="container" style="background-color:white">
        <br>
        <h5> {{ $lesson->content_html }}</h5>
        <br>
    </div> --}}

    {{-- <div class="card">
        <div class="card-body">

            <form  onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                action="{{ route('lesson.destroy', [$module, $lesson->id]) }}" method="post">
                <input type="hidden" name="_method" value="Delete">
                {{ csrf_field() }}
                <a href="{{ route('lesson.edit',[$module, $lesson->id]) }}" class="site-btn col-md-4">@lang('content.edles')</a>
                <button type="submit" class="site-btn-danger col-md-4">@lang('content.delles')</button>
            </form>

        </div>
    </div> --}}
    <div class="row justify-content-center">
        <div class="card col-md-8" style="padding:0">
            <div class="card-body col-md-12">
                <div class="list-group col-md-6">
                    @foreach($simpleQuestions as $simpleQuestion)
                        <div class="d-flex">
                            <a style="font-size: 14px;border-width: 1px"
                                href="{{ route('simpleQuestion.show', ['taskBlock' => $taskBlock->id, 'simpleQuestion' => $simpleQuestion]) }}"
                                class="list-group-item list-group-item-action col-md-6">@lang('content.simpq')
                            </a>
                        </div>
                    @endforeach

                    @foreach($testQuestions as $testQuestion)
                        <div class="d-flex">
                            <a style="font-size: 14px;border-width: 1px"
                                href="{{ route('testQuestion.show', ['taskBlock' => $taskBlock->id, 'testQuestion' => $testQuestion]) }}"
                                class="list-group-item list-group-item-action col-md-6">@lang('content.tq')
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6" >
                    <h3 style="color: rgb(100,150,200)">
                    @lang('content.tbdescription').
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
