@extends('layouts.app')

@section('content')
    <section class="invites-section set-bg fixed" style="height: 800px;"
             data-setbg="{{ asset('img/bg.jpg') }}">
        <div class="container" style="padding-top: 300px;">
            <div class="row justify-content-center">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-6">
                    <div class="text-white">
                        <h3> @lang('content.invs') </h3>
                    </div>
                    @foreach($invites as $invite)
                        <div class="card" style="border: 0; padding: 0;">
                            <div class="card-header text-white "
                                 style="background: #1a2732; background: -webkit-gradient(linear, left top, right top, from(#1a2732), to(#394a59)); background: linear-gradient(to right, #1a2732 0%, #394a59 100%);">
                                <h2 style="margin-top: 10px;"><strong
                                            style="padding-left: 20px;">{{ $invite->message_title }}</strong></h2>
                            </div>
                            <div class="card-body">
                                <p class="text-dark" style="padding-left: 20px;">{{ $invite->message_text }}</p>
                                <div style="padding-left: 20px;" class="d-flex flex-wrap">
                                    <form action="{{ route('classroom.update', [$invite->classroom_id]) }}"
                                          method="post"
                                          enctype="multipart/form-data" style="margin-right: 5px;">
                                        <input type="hidden" name="_method" value="put">
                                        <input type="hidden" name="newIncludedUsers[]" value="{{ Auth::user()->id }}">
                                        {{ csrf_field() }}
                                        <button class="site-btn" type="submit"
                                                value="update">@lang('content.flw')
                                            <i class="fa fa-angle-right"></i></button>
                                    </form>
                                    <form onsubmit="if(confirm('Realy delete?')){return true}else{return false}"
                                          action="{{ route('classroomInvite.destroy', ['classroom' => $invite->classroom_id, 'user' => $invite->user_id, 'invite' => $invite->id]) }}"
                                          method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        {{ csrf_field() }}
                                        <button type="submit"
                                                class="site-btn-danger col-md-12">@lang('content.del')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
