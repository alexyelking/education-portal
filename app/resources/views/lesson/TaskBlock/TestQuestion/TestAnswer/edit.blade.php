@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h3>@lang('content.edans'): {{$testQuestion->text}}</h3>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="card col-md-10" style="padding:0">
            <div class="card-body">
                <form class="contact-form" action="{{ route('testAnswer.update', [$testQuestion->id, $testAnswer->id]) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    <input type="hidden" name="test_question_id" value="{{ $testQuestion->id }}">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <input  type="text" maxlength="256" name="text" value="{{$testAnswer->text}}"  required>
                            <div class="row col-md-6">
                                    <input type="hidden" name="is_correct" value="0">
                                    <input class="col-md-4 size-32" type="checkbox" name="is_correct" value="1">
                                    <label for="is_correct" ><h4>@lang('content.iscor')?</h4></label>
                            </div>
                        </div>
                        <div class="col-md-7" >
                            <button class = "site-btn col-md-4" type="submit" value="create">@lang('content.update')<i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                </form>4
            </div>
        </div>
    </div>


    <br>
</section>


@endsection
