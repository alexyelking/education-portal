<section class="addpanel-section">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading tab-bg-primary">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#profile">
                                <i class="icon-user"></i>
                                @lang('content.prfl')
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#edit-profile">
                                <i class="icon-envelope"></i>
                                @lang('content.editprof')
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="profile" class="tab-pane active">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1>@lang('content.persdat')</h1>
                                    <div class="row">
                                        <div class="bio-row">
                                            <p><span>@lang('content.nm'):</span><strong>{{ $user->name }}</strong></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>@lang('content.eml'):</span><strong>{{ $user->email }}</strong></p>
                                        </div>
                                        <div class="bio-row">
                                            @if($user->created_at)
                                                <p><span>@lang('content.regd'):</span><strong>{{ $user->created_at }}</strong></p>
                                            @else
                                                <p><span>@lang('content.regd'):</span><strong>@lang('content.infonotspec')</strong>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="bio-row">
                                            @if($user->updated_at)
                                                <p><span>@lang('content.lastchanges'):</span><strong>{{ $user->updated_at }}</strong>
                                                </p>
                                            @else
                                                <p><span>@lang('content.lastchanges'):</span><strong>@lang('content.infohnotch')</strong>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="bio-row">
                                            @if($user->dob)
                                                <p><span>@lang('content.dobth'):</span><strong>{{ $user->dob }}</strong></p>
                                            @else
                                                <p><span>@lang('content.dobth'):</span><strong>@lang('content.infonotspec')</strong>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="bio-row">
                                            @if($user->phone)
                                                <p><span>@lang('content.mobile'): </span><strong>{{ $user->phone }}</strong></p>
                                            @else
                                                <p><span>@lang('content.mobile'): </span><strong>@lang('content.infonotspec')</strong></p>
                                            @endif
                                        </div>
                                        <div class="bio-row">
                                            @if($user->skills)
                                                <p><span>Skills: </span><strong>
                                                        @foreach(explode(',',$user->skills) as $skill)
                                                            <small class="label label-warning">{{ $skill }}</small>
                                                        @endforeach
                                                    </strong></p>
                                            @else
                                                <p><span>@lang('content.skills'): </span><strong>@lang('content.infonotspec')</strong></p>
                                            @endif
                                        </div>
                                        <div class="bio-row">
                                            @if($user->sex)
                                                @if($user->sex == 1)
                                                    <p><span>@lang('content.gender'): </span><strong>@lang('content.male')</strong></p>
                                                @else
                                                    <p><span>@lang('content.gender'): </span><strong>@lang('content.fem')</strong></p>
                                                @endif
                                            @else
                                                <p><span>@lang('content.gender'): </span><strong>@lang('content.infonotspec')</strong></p>
                                            @endif
                                        </div>
                                        <div class="bio-row">
                                            @if($user->hobbies)
                                                <p><span>@lang('content.hobbies'): </span><strong>{{ $user->hobbies }}</strong></p>
                                            @else
                                                <p><span>@lang('content.hobbies'): </span><strong>@lang('content.infonotspec')</strong></p>
                                            @endif
                                        </div>
                                        <div class="bio-row">
                                            @if($user->signature)
                                                <p><span>@lang('content.signature'): </span><strong>{{ $user->signature }}</strong></p>
                                            @else
                                                <p><span>@lang('content.signature'): </span><strong>@lang('content.infonotspec')</strong>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                </div>
                            </section>
                        </div>
                        <!-- edit-profile -->
                        <div id="edit-profile" class="tab-pane">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                    <h1>@lang('content.editdata')</h1>
                                    <form class="form-horizontal card-body"
                                          action="{{route('user_settings_save', $user)}}"
                                          method="post"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="put">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" style="color:#000;">@lang('content.avatar')</label>
                                            <div class="col-lg-6">
                                                @if($user->avatar)
                                                    <img src="{{ asset($user->avatar )}}" alt="">
                                                @else
                                                    <img src="{{config('static.static')}}/img/no-photo.jpg" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image"
                                                   class="col-lg-2 control-label" style="color:#000;">@lang('content.chprofimg')</label><br>
                                            <div class="col-lg-6">
                                                <input id="image" type="file" name="image">
                                            </div>
                                        </div>
                                        <hr class="border-dark">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" style="color:#000;">@lang('content.nm')</label>
                                            <div class="col-lg-6">
                                                <input id="name" name="name" type="text" class="form-control"
                                                       value="{{$user->name ?? ""}}" minlength="2" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" style="color:#000;">@lang('content.eml')</label>
                                            <div class="col-lg-6">
                                                <input id="email" name="email" type="email" class="form-control"
                                                       value="{{$user->email ?? ""}}" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="sex" class="col-lg-2 control-label" style="color:#000;">@lang('content.chgender')</label>
                                            <div class="col-lg-6">
                                                <select style="height: 35px;" id="sex" name="sex" class="form-control">
                                                    <option value="0" selected="">@lang('content.notselected')</option>
                                                    <option value="1">@lang('content.male')</option>
                                                    <option value="2">@lang('content.fem')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-lg-2 control-label" style="color:#000;">@lang('content.mobile')</label>
                                            <div class="col-lg-6">
                                                <input id="phone" name="phone" type="number" class="form-control"
                                                       value="{{$user->phone ?? ""}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob" class="col-lg-2 control-label" style="color:#000;">@lang('content.bdaydmy')</label>
                                            <div class="col-lg-6">
                                                <input id="dob" name="dob" type="date" class="form-control"
                                                       value="{{$user->dob ?? ""}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="skills" class="col-lg-2 control-label" style="color:#000;">@lang('content.skills')</label>
                                            <div class="col-lg-6">
                                                <input id="skills" name="skills" type="text" class="form-control"
                                                       value="{{$user->skills ?? ""}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hobbies" class="col-lg-2 control-label" style="color:#000;">@lang('content.hobbies')</label>
                                            <div class="col-lg-6">
                                                <input id="hobbies" name="hobbies" type="text" class="form-control"
                                                       value="{{$user->hobbies ?? ""}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="signature" class="col-lg-2 control-label" style="color:#000;">@lang('content.signature')</label>
                                            <div class="col-lg-6">
                                                <input id="signature" name="signature" type="text" class="form-control"
                                                       value="{{$user->signature ?? ""}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="col-lg-2 control-label" style="color:#000;">@lang('content.status')</label>
                                            <div class="col-lg-6">
                                                <input id="status" name="status" type="text" class="form-control"
                                                       value="{{$user->status ?? ""}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-primary">@lang('content.save')</button>
                                                {{--<button type="button" class="btn btn-danger">@lang('content.cancel')</button>--}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>