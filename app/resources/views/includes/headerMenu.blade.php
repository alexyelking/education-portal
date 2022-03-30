@if (Request::is('/')|| Request::is('course/*'))
    <div class="row justify-content-center">
        <div class="dropdown">
            <button  class="nav-item active  site-btn-info-sm col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <strong>@lang('content.ent')</strong>
                <i class="dropdown-toggle"></i>
            </button>
            <div class="dropdown-menu" style="background-color: #3B3444" aria-labelledby="dropdownMenuButton">
                @guest
                    <a class="dropdown-item" style="background-color: #3B3444"
                       href="{{ route('user.showLoginForm') }}">@lang('content.asus')</a>
                @else
                    @auth('web')
                        <a class="dropdown-item" style="background-color: #3B3444"
                           href="{{ route('user.dashboard') }}">@lang('content.asus')</a>
                    @endauth
                @endguest
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('teacher.showLoginForm') }}">@lang('content.astch')</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="nav-item active  site-btn-danger-sm col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <strong>@lang('content.reg')</strong>
                <i class="dropdown-toggle"></i>
            </button>
            <div class="dropdown-menu" style="background-color: #3B3444" aria-labelledby="dropdownMenuButton">
                @guest
                    <a class="dropdown-item" style="background-color: #3B3444"
                       href="{{ route('user.showRegisterForm') }}">@lang('content.asus')</a>
                @else
                    @auth('web')
                        <a class="dropdown-item" style="background-color: #3B3444"
                           href="{{ route('user.dashboard') }}">@lang('content.asus')</a>
                    @endauth
                @endguest
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('teacher.showRegisterForm') }}">@lang('content.astch')</a>
            </div>
        </div>
    </div>
@endif

@if (Request::is('user') || Request::is('user/*'))
    @auth('web')
        <div class="dropdown">
            <button class="site-btn-danger-sm col-md-7" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <strong>{{ Auth::user()->name }}</strong>
                <i class="dropdown-toggle"></i>
            </button>
            <div class="dropdown-menu" style="background-color: #3B3444" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('user_settings') }}"><strong>@lang('content.profile')</strong></a>
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('user.dashboard')}}">Dashboard</a>
                {{--<a class="dropdown-item" style="background-color: #3B3444"--}}
                {{--href="{{ route('home') }}">To the home</a>--}}
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('user.logout') }}">@lang('content.logoutbtn')</a>
            </div>
        </div>
    @endauth
@endif




@if (Request::is('teacher') || Request::is('teacher/*'))
    @auth('teacher')
        <div class="dropdown">
            <button class="site-btn-danger-sm col-md-7" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <strong>{{ Auth::user()->name }}</strong>
                <i class="dropdown-toggle"></i>
            </button>
            <div class="dropdown-menu" style="background-color: #3B3444" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('teacher_settings') }}"><strong>@lang('content.profile')</strong></a>
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('teacher.dashboard') }}">@lang('content.tchdash')</a>
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('course.create') }}">@lang('content.create course')</a>
                <a class="dropdown-item" style="background-color: #3B3444"
                   href="{{ route('teacher.logout') }}">@lang('content.logoutbtn')</a>
            </div>
        </div>
    @endauth
@endif
