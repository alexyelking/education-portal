@extends('layouts.app')

@section('content')
    <!-- Create section -->
    <section class="classroom-section set-bg fixed" style="height: 1100px;"
             data-setbg="{{ asset('img/bg.jpg') }}">
        <div class="container" style="padding-top: 220px;">
            <div class="row justify-content-center">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 card"
                     style="border: 0; padding: 0;">
                    <div class="text-white card-header"
                         style="background: #185dd0; background: -webkit-gradient(linear, left top, right top, from(#185dd0), to(#7076fc)); background: linear-gradient(to right, #185dd0 0%, #7076fc 100%);">
                        <h2 style="margin-top: 10px;"><strong
                                    style="padding-left: 20px;">@lang('content.creature')</strong></h2>
                    </div>
                    <form class="form-horizontal card-body" action="{{route('course.store')}}" method="post"
                          enctype="multipart/form-data" style="padding: 32.5px;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {{-- Form include --}}
                        @include('course.partials.form')
                        <label for="">@lang('content.choosecrscover')</label><br>

                        <input type="file" name="image" style="margin-bottom: 15px;">

                        <button class="site-btn" type="submit">Create<i class="fa fa-angle-right"></i></button>

                        <a href="{{route('teacher.dashboard')}}" class="site-btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </section>
    <!-- Create section end -->
@endsection
