@extends('layouts.app')

@section('content')
    <!-- Login section -->
    <section class="hero-section set-bg fixed" style="height: 800px;" data-setbg="{{ asset('img/bg.jpg') }}">
        <div class="container" style="padding-top: 300px;">
            <div class="row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-8 col-lg-7 col-xl-6 card"
                     style="border: 0; padding: 0; color: gray;">
                    <div class="text-white card-header"
                         style="background: #185dd0; background: -webkit-gradient(linear, left top, right top, from(#185dd0), to(#7076fc)); background: linear-gradient(to right, #185dd0 0%, #7076fc 100%);">
                        <h2 style="text-align: center;">@lang('content.lat')</h2>
                    </div>
                    <form method="POST" action="{{ route('teacher.loginRequest') }}" style="padding-top: 25px;"
                          class="contact-form card-body">
                        @csrf
                        <div class="row text-center">
                            <div class="col-md-6 offset-md-3">
                                <input style="text-align: center;" class="@error('email') is-invalid @enderror text"
                                       id="email"
                                       type="email"
                                       name="email"
                                       placeholder="@lang('content.entemail')"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <input style="text-align: center;" class="@error('password') is-invalid @enderror"
                                       id="password"
                                       type="password"
                                       name="password"
                                       placeholder="@lang('content.entpsw')"
                                       required
                                       autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <hr>
                            <div class="col-md-6 offset-md-3">
                                <input style="height: 15px; width: 15px;" type="checkbox"
                                       class="input form-check-input"
                                       id="remember"
                                       name="remember"
                                       value="{{ old('remember') ? 'checked' : '' }}">
                                <label class="form-check-label" for="remember"
                                       style="margin-left: 30px; padding-top: 2px;">
                                    @lang('content.remme')
                                </label>
                                <hr style="border-color: white;">
                            </div>
                            <div class="col-md-6 offset-md-3 justify-content-centeru">
                                <button type="submit" style="margin-bottom: 10px;" class="site-btn">
                                    @lang('content.ent')
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
