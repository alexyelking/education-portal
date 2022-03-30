<section class="owninformation-section">
    <div class="row">
        <!-- profile-widget -->
        <div class="col-lg-12">
            <div class="profile-widget profile-widget-primary" style="">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 flex-column justify-content-center d-flex">
                            <h4 class="text-white"><strong>@lang('content.usr')</strong></h4>
                            <div class="follow-ava">
                                @if($user->avatar)
                                    <img src="{{ asset($user->avatar )}}" alt="">
                                @else
                                    <img src="{{config('static.static')}}/img/no-photo.jpg" alt="">
                                @endif
                            </div>
                            <h6><strong>{{ $user->name }}</strong></h6>
                        </div>
                        <div class="col-lg-4 col-sm-4 follow-info">
                            @if($user->status)
                                <p><strong>
                                        <h666>@lang('content.status'): {{ $user->status }}</h666>
                                    </strong></p>
                            @else
                                <p><strong>
                                        <h666>@lang('content.status'): @lang('content.infonotspec')</h666>
                                    </strong></p>
                            @endif
                            @if($user->phone)
                                <p><strong>
                                        <h666>@lang('content.cnum'): {{ $user->phone }}</h666>
                                    </strong></p>
                            @else
                                <p><strong>
                                        <h666>@lang('content.cnum'): @lang('content.infonotspec')</h666>
                                    </strong></p>
                            @endif
                            {{--<h6>--}}
                            {{--<span><i class="icon_clock_alt"></i>11:05 AM</span>--}}
                            {{--<span><i class="icon_calendar"></i>25.10.13</span>--}}
                            {{--<span><i class="icon_pin_alt"></i>NY</span>--}}
                            {{--</h6>--}}
                        </div>
                    </div>
                    <!--<div class="col-lg-2 col-sm-6 follow-info weather-category">
                        <ul>
                            <li class="active">
                                <i class="fa fa-comments fa-2x"> </i><br> Сontact
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-6 follow-info weather-category">
                        <ul>
                            <li class="active">
                                <i class="fa fa-bell fa-2x"> </i><br> Notify
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-6 follow-info weather-category">
                        <ul>
                            <li class="active">
                                <i class="fa fa-tachometer fa-2x"> </i><br>Anything else
                            </li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</section>