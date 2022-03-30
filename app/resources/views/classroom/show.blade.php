@extends('layouts.app')

@section('content')
    <section class="classroom-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="hero-text text-white">
                    {{-- <h4></h4> --}}
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card col-md-6 col-sm-10">
                <div class="card-body">
                    <div class="card-title" style="color:darkslategray">
                        <strong>@lang('content.classrm'): {{ $classroom->name }}</strong>
                    </div>
                    <div class="card-header" style="color:gray">
                        <strong>@lang('content.prtnts')</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($users as $user)
                            <li class="list-group-item">{{ $user->name}}</li>
                        @endforeach
                    </ul>
                    <div class="card-header" style="color:gray">
                        <strong>@lang('content.inclcour')</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($courses as $course)
                            <li class="list-group-item">{{ $course->title }}</li>
                        @endforeach
                    </ul>
                    <form onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                          action="{{ route('classroom.destroy', [$classroom->id]) }}" method="post">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                        <a href="{{ route('classroom.edit',[$classroom->id]) }}"
                           class="site-btn col-md-4">@lang('content.edclass')</a>
                        <button type="submit" class="site-btn-danger col-md-4">@lang('content.delclassrm')</button>

                    </form>
                    <br>
                </div>
            </div>
        </div>
        <br>

    </section>


@endsection
