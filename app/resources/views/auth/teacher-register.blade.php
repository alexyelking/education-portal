@extends('layouts.app')

@section('content')
    <!-- Login section -->
    <section class="hero-section set-bg fixed" style="height: 800px;" data-setbg="{{ asset('img/bg.jpg') }}">
        <div class="container" style="padding-top: 250px;">
            <div class="row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-8 col-lg-7 col-xl-6 card"
                     style="border: 0; padding: 0; color: gray;">
                    <div class="text-white card-header"
                         style="background: #1a2732; background: -webkit-gradient(linear, left top, right top, from(#1a2732), to(#394a59)); background: linear-gradient(to right, #1a2732 0%, #394a59 100%);">
                        <h2 style="text-align: center;">@lang('content.tchreg')</h2>
                    </div>
                    <form method="POST" action="{{ route('teacher.registerRequest') }}" style="padding-top: 25px;"
                          class="contact-form card-body">
                        @csrf
                        <div class="row text-center">
                            <div class="col-md-6 offset-md-3">
                                <input style="text-align: center;" class="@error('name') is-invalid @enderror"
                                       id="name"
                                       type="text"
                                       name="name"
                                       placeholder="@lang('content.enm')"
                                       value="{{ old('name') }}"
                                       required
                                       minlength=2
                                       maxlength=20>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <input style="text-align: center;" class="@error('email') is-invalid @enderror"
                                       id="email"
                                       type="email"
                                       name="email" placeholder="@lang('content.entemail')" value="{{ old('email') }}"
                                       required
                                       minlength=5>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <input style="text-align: center;" class="@error('password') is-invalid @enderror"
                                       id="password"
                                       type="password"
                                       name="password"
                                       placeholder="@lang('content.entpsw')"
                                       required
                                       autocomplete="new-password"
                                       minlength=6>
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <input style="text-align: center;"
                                       id="password-confirm"
                                       type="password"
                                       name="password_confirmation"
                                       placeholder="Confirm the password"
                                       required autocomplete="new-password"
                                       minlength=6>
                                <hr style="border-color: white;">
                            </div>
                            <div class="col-md-6 offset-md-3 justify-content-centeru">
                                <button type="submit" style="margin-bottom: 10px;" class="site-btn">
                                    @lang('content.reg')
                                </button>
                                <a class="site-btn-danger" href="{{ route('home') }}">@lang('content.bckhome')</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Login section end -->
@endsection
