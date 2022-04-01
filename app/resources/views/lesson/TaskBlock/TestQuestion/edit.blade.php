@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}" >

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h3>@lang('content.edtestq') {{$taskBlock->position + 1}}</h3>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="card col-md-10" style="padding:0">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h3>@lang('content.ansvarlist')</h3>
                        <br>
                        <div class="list-group col-md-5" >
                            @foreach($correctTestAnswers as $testAnswer)
                                <div class="list-group-item list-group-item-action; padding: 0">
                                    <a style="font-size: 14px;border-width: 1px; color:green; margin: 0;"
                                        href="{{ route('testAnswer.show', [$testQuestion->id, $testAnswer->id]) }}"
                                        class="col-md-6">{{$testAnswer->text}}
                                    </a>

                                    <a class="site-btn-hollow col-md-3" style="margin: 0; "
                                        href="{{route('testAnswer.edit', [$testQuestion->id, $testAnswer->id])}}"><i class="fa fa-edit"></i></a>
                                    <form class="col-md-3"
                                        onsubmit="if(confirm('Delete step?')){return true}else{return false}"
                                        action="{{route('testAnswer.destroy', [$testQuestion, $testAnswer])}}"
                                        method="post">
                                        <input type="hidden" name="_method" value="Delete">
                                        {{ csrf_field() }}
                                        <button type="submit" class="site-btn-danger-sm">X</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <div class="list-group col-md-5"  >
                            @foreach($wrongTestAnswers as $testAnswer)
                                <div class="list-group-item list-group-item-action; padding: 0">
                                    <a style="font-size: 14px;border-width: 1px; color:crimson; margin: 0;"
                                        href="{{ route('testAnswer.show', [$testQuestion->id, $testAnswer->id]) }}"
                                        class="col-md-6">{{$testAnswer->text}}
                                    </a>
                                    <a class="site-btn-hollow col-md-3" style="margin: 0; "
                                        href="{{route('testAnswer.edit', [$testQuestion->id, $testAnswer->id])}}"><i class="fa fa-edit"></i></a>
                                    <form class="col-md-3"
                                        onsubmit="if(confirm('Delete step?')){return true}else{return false}"
                                        action="{{route('testAnswer.destroy', [$testQuestion, $testAnswer])}}"
                                        method="post">
                                        <input type="hidden" name="_method" value="Delete">
                                        {{ csrf_field() }}
                                        <button type="submit" class="site-btn-danger-sm">X</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <a style="font-size: 14px;"
                            href="{{ route('testAnswer.create', [$testQuestion->id]) }}"
                            class="site-btn col-md-1">✚
                        </a>


                    </div>
                    <form class="contact-form" action="{{ route('testQuestion.update', [$taskBlock->id, $testQuestion->id]) }}" method="POST" enctype="multipart/form-data">
                        <div class="row justify-content-center col-md-12">
                            <div class="row col-md-4">
                                <input class="col-md-4" type="number" name="correct_count" value="{{$testQuestion->correct_count}}" required>
                                <label for="correct_count" ><h3 style="color:green">@lang('content.hmvars')?</h3></label>
                            </div>
                            <div class="row col-md-4">
                                <input class="col-md-4" type="number" name="wrong_count" value="{{$testQuestion->wrong_count}}" required>
                                <label for="wrong_count" ><h3 style="color:crimson">@lang('content.hmwvars')?</h3></label>
                            </div>

                            <input  type="text" class="col-md-8" maxlength="1024" name="text" value="{{$testQuestion->text}}"  required>
                            <input type="hidden" name="_method" value="put">
                            {{csrf_field()}}
                            <input type="hidden" name="task_block_id" value="{{ $taskBlock->id }}">
                            <input type="hidden" name="image_link" value="#">
                            <div class="row justify-content-begin col-md-8" >
                                <button class = "site-btn col-md-4" type="submit" value="update">@lang('content.update')<i class="fa fa-angle-right"></i></button>
                                <a class = "site-btn-danger col-md-4" href="{{route('testQuestion.destroy', [$taskBlock->id, $testQuestion->id])}}" value="create">Delete</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <br>
</section>


@endsection
