@extends('layouts.app')

@section('content')
    <section class="classroom-section set-bg fixed" style="height: 800px;"
             data-setbg="{{ asset('img/bg.jpg') }}">
        <div class="container" style="padding-top: 350px;">
            <div class="row justify-content-center">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-6 card"
                     style="border: 0; padding: 0;">
                    <div class="text-white card-header"
                         style="background: #185dd0; background: -webkit-gradient(linear, left top, right top, from(#185dd0), to(#7076fc)); background: linear-gradient(to right, #185dd0 0%, #7076fc 100%);">
                        <h2 style="margin-top: 10px;"><strong
                                    style="padding-left: 20px;">@lang('content.crclassrm')</strong></h2>
                    </div>
                    <div class="card-body">
                        <form class="contact-form" action="{{ route('classroom.store') }}" method="POST"
                              style="padding-left: 20px; padding-right: 20px"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="teacher_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="slug" value="slug">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding: 0;">
                                <input class="" style="background-color:lightgray" type="text"
                                       maxlength="64" name="name" placeholder="@lang('content.classrmnm')"
                                       value="{{ $classroom->name ?? "" }}" required>
                            </div>
                            <button type="button"
                                    class="site-btn-info"
                                    data-toggle="modal"
                                    data-target=".bd-example-modal-md-users">@lang('content.invus')</button>
                            <div class="modal fade bd-example-modal-md-users" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel2" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content" style="margin-top: 400px;">
                                        <div class="modal-header">
                                            <h4 class="modal-title">@lang('content.invus')</h4>

                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                        </div>
                                        {{-- TOOD make search form --}}
                                        @foreach($users as $user)
                                            <div class="row justify-content-center">
                                                <div class="col-md-8">
                                                    {{ $user->name}}
                                                </div>
                                                <a href="#"
                                                   class="btn btn-secondary col-md-2">@lang('content.invite')</a>
                                            </div>
                                        @endforeach
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                    class="site-btn-info"
                                    data-toggle="modal"
                                    data-target=".bd-example-modal-sm-courses">@lang('content.includecour')</button>
                            <div class="modal fade bd-example-modal-sm-courses" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel2" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content" style="margin-top: 350px;">
                                        <div class="modal-header">
                                            <h4 class="modal-title">@lang('content.includecour')</h4>

                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <strong>@lang('content.ctitle')</strong>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>@lang('content.include')</strong>
                                            </div>
                                        </div>
                                        @foreach($courses as $course)
                                            <div class="row justify-content-center">
                                                <div class="col-md-8">
                                                    {{ $course->title }}
                                                </div>
                                                {{-- <a href="#" class="btn btn-secondary  col-md-2">@lang('content.include')</a> --}}
                                                <div class="col-md-3">
                                                    <input class="col-md-3" type="checkbox"
                                                           name="includedCourses[]" value="{{ $course->id }}">
                                                </div>
                                            </div>
                                        @endforeach
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <button class="site-btn" type="submit"
                                    value="store">@lang('content.create')<i class="fa fa-angle-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
