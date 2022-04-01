@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}" >
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h2>@lang('content.tq')</h2>
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
                    <strong>@lang('content.qtext'):  {{ $testQuestion->text }}</strong>
                </div>
                <br>

                <h4>@lang('content.anslist')</h4>

                <br>

                <div class="list-group col-md-3">
                    @foreach($correctTestAnswers as $testAnswer)
                        <a style="font-size: 14px;border-width: 1px; color:green"
                            href="{{ route('testQuestion.show', [$testQuestion->id, $testAnswer->id]) }}"
                            class="list-group-item list-group-item-action col-md-12">{{$testAnswer->text}}
                        </a>
                    @endforeach
                </div>

                <div class="list-group col-md-3">
                    @foreach($wrongTestAnswers as $testAnswer)
                        <a style="font-size: 14px;border-width: 1px; color:crimson"
                            href="{{ route('testQuestion.show', [$testQuestion->id, $testAnswer->id]) }}"
                            class="list-group-item list-group-item-action col-md-12">{{$testAnswer->text}}
                        </a>
                    @endforeach
                </div>


                <div class="row col-md-4">
                    <label for="correct_count" ><h4 style="color:green">@lang('content.stwillget') {{$testQuestion->correct_count}} @lang('content.coransvars')</h4></label>
                </div>
                <div class="row col-md-3">
                    <label for="correct_count" ><h4 style="color:crimson">@lang('content.and') {{$testQuestion->wrong_count}} @lang('content.wansvars')</h4></label>
                </div>

                <br>

                <form  onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}" class="col-md-4"
                    action="{{ route('testQuestion.destroy', [$taskBlock->id, $testQuestion->id]) }}" method="post">
                    <input type="hidden" name="_method" value="Delete">
                    {{ csrf_field() }}
                    <a href="{{ route('testQuestion.edit',[$taskBlock->id, $testQuestion->id]) }}" class="site-btn col-md-4">@lang('content.edit')</a>
                    <button type="submit" class="site-btn-danger col-md-4">@lang('content.del')</button>
                </form>

            </div>
        </div>
    </div>
    <br>
</section>
@endsection
