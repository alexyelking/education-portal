@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{config('static.static')}}/img/bg.jpg" >

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h3>@lang('content.emod'): {{ $module->name }}</h3>
            </div>
        </div>
    </div>

    <br>


        <div class="row justify-content-center">
            <div class="card col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="list-group col-md-4">
                                <div class="row justify-content-center">
                                     <h5>@lang('content.lessons')</h5>
                                </div>
                                <br>
                            @foreach($lessons as $lesson)
                            <div class="row">
                                <a style="border-width: 1px" href="{{ route('lesson.show', ['course'=>$course->id, 'lesson'=>$lesson->id]) }}"style="font-size: 14px;"class="list-group-item list-group-item-action col-md-8">📄{{ $lesson->title }}</a>
                                <a class="site-btn-hollow col-md-2" href="{{route('lesson.edit', [$module->id, $lesson->id])}}"><i class="fa fa-edit"></i></a>
                                <form class="col-md-2" style="padding: 0" onsubmit="if(confirm('Delete module?')){return true}else{return false}" action="{{route('lesson.destroy', [$module, $lesson])}}" method="post">
                                    <input type="hidden" name="_method" value="Delete">
                                    {{ csrf_field() }}
                                        <button type="submit" class="site-btn-danger col-md-12">X</button>
                                </form>
                            </div>
                            @endforeach
                            <div class="row">
                                <a class="site-btn-info col-md-12" href="{{ route('lesson.create', $module->id) }}">✚</a>
                            </div>
                        </div>


                        <form class="contact-form col-md-8" action="{{ route('module.update', [$course->id, $module->id]) }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            {{ csrf_field() }}
                            <div class="row justify-content-center">
                                <input  class="col-md-7" type="text" maxlength="64" name="name" placeholder="Module title" value="{{ $module->name }}" required>
                                <input type="hidden" name="course_id" value="{{ $module->course_id}}">
                                <input type="hidden" name="position" value = "{{ $module->position }}">
                                <div class="col-md-7" >
                                    <button class = "site-btn col-md-4" type="submit" value="update">@lang('content.update')<i class="fa fa-angle-right"></i></button>
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
