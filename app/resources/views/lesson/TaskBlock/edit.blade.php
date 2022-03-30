@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h3>@lang('content.edtb') {{ $taskBlock->position}}</h3>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="card col-md-10" style="padding:0">
            <div class="card-body">
                <div class="list-group col-md-2">
                    <a style="border-width: 1px;font-size: 16px; padding-left:4px;"
                        href="{{ route('simpleQuestion.create', $taskBlock->id) }}"
                        class="list-group-item list-group-item-action col-md-12 flaticon-question ">
                        ✚ @lang('content.simpq')
                    </a>
                    <a style="border-width: 1px;font-size: 16px; padding-left:4px;"
                        href="{{ route('testQuestion.create', $taskBlock->id) }}"
                        class="list-group-item list-group-item-action col-md-12 flaticon-test-1">
                        ✚ @lang('content.tq')
                    </a>
                    <a style="border-width: 1px;font-size: 16px; padding-left:4px;"
                        href="#"
                        class="list-group-item list-group-item-action col-md-12 flaticon-code">
                        ✚ @lang('content.codetask') (to do)
                    </a>
                    <a style="border-width: 1px;font-size: 16px; padding-left:4px;"
                        href="#"
                        class="list-group-item list-group-item-action col-md-12 flaticon-calculator">
                        ✚ @lang('content.mathtask') (to do)
                    </a>
                    <a style="border-width: 1px;font-size: 16px; padding-left:4px;"
                        href="#"
                        class="list-group-item list-group-item-action col-md-12 flaticon-questions">
                        ✚ compliance(todo)
                    </a>
                    <a style="border-width: 1px;font-size: 16px; padding-left:4px;"
                        href="#"
                        class="list-group-item list-group-item-action col-md-12 flaticon-questions">
                        ✚ hahah task(todo)
                    </a>
                    <a style="border-width: 1px;font-size: 16px; padding-left:4px;"
                        href="#"
                        class="list-group-item list-group-item-action col-md-12 flaticon-questions">
                        ✚ another task/todo
                    </a>
                </div>




                <div class="list-group col-md-6">
                    @foreach($simpleQuestions as $simpleQuestion)
                        <div class="d-flex">
                            <a style="font-size: 14px;border-width: 1px"
                               href="{{ route('simpleQuestion.show', ['taskBlock' => $taskBlock->id, 'simpleQuestion' => $simpleQuestion]) }}"
                               class="list-group-item list-group-item-action col-md-10">{{$simpleQuestion->text}}</a>
                            <a class="site-btn-hollow col-md-1"
                               href="{{route('simpleQuestion.edit', [$taskBlock->id, $simpleQuestion->id])}}"><i class="fa fa-edit"></i></a>
                            <form class="col-md-1 p-0"
                                  onsubmit="if(confirm('Delete step?')){return true}else{return false}"
                                  action="{{route('simpleQuestion.destroy', ['taskBlock' => $taskBlock, 'simpleQuestion' => $simpleQuestion])}}"
                                  method="post">
                                <input type="hidden" name="_method" value="Delete">
                                {{ csrf_field() }}
                                <button type="submit" class="site-btn-danger w-100">X</button>
                            </form>
                        </div>
                    @endforeach

                    @foreach($testQuestions as $testQuestion)
                        <div class="d-flex">
                            <a style="font-size: 14px;border-width: 1px"
                                href="{{ route('testQuestion.show', ['taskBlock' => $taskBlock->id, 'testQuestion' => $testQuestion]) }}"
                                class="list-group-item list-group-item-action col-md-10">{{$testQuestion->text}}</a>
                            <a class="site-btn-hollow col-md-1"
                                href="{{route('testQuestion.edit', [$taskBlock->id, $testQuestion->id])}}"><i class="fa fa-edit"></i></a>
                            <form class="col-md-1 p-0"
                                    onsubmit="if(confirm('Delete step?')){return true}else{return false}"
                                    action="{{route('testQuestion.destroy', ['taskBlock' => $taskBlock, 'testQuestion' => $testQuestion])}}"
                                    method="post">
                                <input type="hidden" name="_method" value="Delete">
                                {{ csrf_field() }}
                                <button type="submit" class="site-btn-danger w-100">X</button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4" >
                <h4 style="color: rgb(100,150,200)">@lang('content.qcdescription')</h4>
                </div>


            </div>
        </div>
    </div>
    <br>
</section>



@endsection
