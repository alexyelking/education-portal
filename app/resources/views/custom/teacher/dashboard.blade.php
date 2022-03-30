@extends('layouts.app')

@section('content')
    <section class="dashboard-section set-bg" data-setbg="{{ asset('img/bg.jpg') }}">
        <div class="container">
            <div class="d-flex-row justify-content-center">
                <div class="col-md-12">
                    <div class="hero-text text-white">
                        {{-- <div class="card-header">@lang('content.tchdash')</div> --}}
                        <h2>@lang('content.tchdash')</h2>
                        <div class="card-body"  style="padding: 0;">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h3>@lang('content.logntf')!</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex-row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title h4" style="color:darkslategray">
                                <strong>@lang('content.clovrvw')</strong>
                            </div>
                            <div class="d-flex flex-column ">
                                @foreach($classrooms as $classroom)
                                    <form class="form-group col-md-12 px-0 d-flex-row"
                                          onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                                          action="{{ route('classroom.destroy', [$classroom->id]) }}" method="post">
                                        <input type="hidden" name="_method" value="Delete">
                                        {{ csrf_field() }}

                                        <div class="card-header h4 col-md-12" style="color:gray">
                                            <strong>{{  $classroom->name }}</strong>
                                        </div>
                                        <a href="{{ route('classroom.edit',[$classroom->id]) }}"
                                           class="site-btn col-sm-6">@lang('content.edclass')</a>
                                        <button type="submit"
                                                class="site-btn-danger col-sm-6">@lang('content.del') </button>
                                    </form>
                                @endforeach
                                <a href="{{ route('classroom.create') }}"
                                   class="site-btn-hollow col-md-12 mt-auto">@lang('content.crnew')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title h4" style="color:darkslategray">
                                <strong>@lang('content.courovrvw')</strong>
                            </div>
                            <div class="d-flex flex-column ">
                                @foreach($courses as $course)

                                    <form class="form-group col-md-12 px-0 d-flex-row"
                                          onsubmit="if(confirm('@lang('content.reallydel')?')){return true}else{return false}"
                                          action="{{ route('course.destroy', [$course->id]) }}" method="post">
                                        <input type="hidden" name="_method" value="Delete">
                                        {{ csrf_field() }}

                                        <div class="card-header h4 col-md-12" style="color:gray">
                                            <strong>{{  $course->title }}</strong>
                                        </div>
                                        <a href="{{ route('course.edit',[$course->id]) }}"
                                           class="site-btn col-md-4">@lang('content.edcour')</a>
                                        <a href="{{ route('course.show',[$course->id]) }}"
                                           class="site-btn-info col-md-4">@lang('content.look')</a>
                                        <button type="submit"
                                                class="site-btn-danger col-md-4">@lang('content.delcour')</button>


                                    </form>
                                @endforeach
                                <a href="{{ route('course.create') }}"
                                   class="site-btn-hollow col-md-12">@lang('content.crnew')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
    </section>
@endsection
