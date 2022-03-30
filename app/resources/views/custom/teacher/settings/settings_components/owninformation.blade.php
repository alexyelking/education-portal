<section class="owninformation-section">
    <div class="row">
        <!-- profile-widget -->
        <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 flex-column justify-content-center d-flex">
                            <h4><strong>@lang('content.rteacher')</strong></h4>
                            <div class="follow-ava">
                                @if($teacher->avatar)
                                    <img src="{{ asset($teacher->avatar )}}" alt="">
                                @else
                                    <img src="{{config('static.static')}}/img/no-photo.jpg" alt="">
                                @endif
                            </div>
                            <h6><strong>{{ $teacher->name }}</strong></h6>
                        </div>
                        <div class="col-lg-4 col-sm-4 follow-info">
                            {{--@if($user->status)--}}
                            {{--<p><strong>--}}
                            {{--<h666>Status: {{ $user->status }}</h666>--}}
                            {{--</strong></p>--}}
                            {{--@else--}}
                            {{--<p><strong>--}}
                            {{--<h666>Status: Information not specified</h666>--}}
                            {{--</strong></p>--}}
                            {{--@endif--}}
                            {{--@if($user->phone)--}}
                            {{--<p><strong>--}}
                            {{--<h666>Contact number: {{ $user->phone }}</h666>--}}
                            {{--</strong></p>--}}
                            {{--@else--}}
                            {{--<p><strong>--}}
                            {{--<h666>Contact number: Information not specified</h666>--}}
                            {{--</strong></p>--}}
                            {{--@endif--}}
                            {{--<h6>--}}
                            {{--<span><i class="icon_clock_alt"></i>11:05 AM</span>--}}
                            {{--<span><i class="icon_calendar"></i>25.10.13</span>--}}
                            {{--<span><i class="icon_pin_alt"></i>NY</span>--}}
                            {{--</h6>--}}
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
    </div>
</section>