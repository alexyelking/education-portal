<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{ route('admin.dashboard') }}">
                    <i class="icon_house_alt"></i>
                    <span>@lang('content.dash')</span>
                </a>
            </li>

            <li>
                <a class="" href="{{ route('admin_profile', Auth::user()->id) }}">
                    <i class="icon_document_alt"></i>
                    <span>@lang('content.prfl')</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:" class="">
                    <i class="icon_table"></i>
                    <span>@lang('content.tbls')</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('users.list') }}">@lang('content.usrs')</a></li>
                    <li><a class="" href="{{ route('teachers.list') }}">@lang('content.tchrs')</a></li>
                    <li><a class="" href="{{ route('admins.list') }}">@lang('content.adms')</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->