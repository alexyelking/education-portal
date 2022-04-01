<section class="addpanel-section">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading tab-bg-info">
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
                                            <p><span>@lang('content.nm'):</span><strong>{{ $teacher->name }}</strong></p>
                                        </div>
                                        <div class="bio-row">
                                            <p><span>@lang('content.eml'):</span><strong>{{ $teacher->email }}</strong></p>
                                        </div>
                                        <div class="bio-row">
                                            @if($teacher->created_at)
                                                <p><span>@lang('content.regd'):</span><strong>{{ $teacher->created_at }}</strong></p>
                                            @else
                                                <p><span>@lang('content.regd'):</span><strong>@lang('content.infonotspec')</strong>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="bio-row">
                                            @if($teacher->updated_at)
                                                <p><span>@lang('content.lastchanges'):</span><strong>{{ $teacher->updated_at }}</strong>
                                                </p>
                                            @else
                                                <p><span>@lang('content.lastchanges'):</span><strong>@lang('content.infohnotch')</strong>
                                                </p>
                                            @endif
                                        </div>
                                        {{--<div class="bio-row">--}}
                                            {{--@if($user->dob)--}}
                                                {{--<p><span>Date of Birth:</span><strong>{{ $user->dob }}</strong></p>--}}
                                            {{--@else--}}
                                                {{--<p><span>Date of Birth:</span><strong>Information not specified</strong>--}}
                                                {{--</p>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<div class="bio-row">--}}
                                            {{--@if($user->phone)--}}
                                                {{--<p><span>Mobile: </span><strong>{{ $user->phone }}</strong></p>--}}
                                            {{--@else--}}
                                                {{--<p><span>Mobile: </span><strong>Information not specified</strong></p>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<div class="bio-row">--}}
                                            {{--@if($user->skills)--}}
                                                {{--<p><span>Skills: </span><strong>--}}
                                                        {{--@foreach(explode(',',$user->skills) as $skill)--}}
                                                            {{--<small class="label label-warning">{{ $skill }}</small>--}}
                                                        {{--@endforeach--}}
                                                    {{--</strong></p>--}}
                                            {{--@else--}}
                                                {{--<p><span>Skills: </span><strong>Information not specified</strong></p>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<div class="bio-row">--}}
                                            {{--@if($user->sex)--}}
                                                {{--@if($user->sex == 1)--}}
                                                    {{--<p><span>Gender: </span><strong>Male</strong></p>--}}
                                                {{--@else--}}
                                                    {{--<p><span>Gender: </span><strong>Female</strong></p>--}}
                                                {{--@endif--}}
                                            {{--@else--}}
                                                {{--<p><span>Gender: </span><strong>Information not specified</strong></p>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<div class="bio-row">--}}
                                            {{--@if($user->hobbies)--}}
                                                {{--<p><span>Hobbies: </span><strong>{{ $user->hobbies }}</strong></p>--}}
                                            {{--@else--}}
                                                {{--<p><span>Hobbies: </span><strong>Information not specified</strong></p>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<div class="bio-row">--}}
                                            {{--@if($user->signature)--}}
                                                {{--<p><span>Signature: </span><strong>{{ $user->signature }}</strong></p>--}}
                                            {{--@else--}}
                                                {{--<p><span>Signature: </span><strong>Information not specified</strong>--}}
                                                {{--</p>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
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
                                          action="{{route('teacher_settings_save', $teacher)}}"
                                          method="post"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="put">
                                        {{ csrf_field() }}

                                        {{--<div class="form-group">--}}
                                            {{--<label class="col-lg-2 control-label" style="color:#000;">Avatar</label>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--@if($user->avatar)--}}
                                                    {{--<img src="{{ asset($user->avatar )}}" alt="">--}}
                                                {{--@else--}}
                                                    {{--<img src="#" alt="">--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group row">--}}
                                            {{--<label for="image"--}}
                                                   {{--class="col-lg-2 control-label" style="color:#000;">@lang('content.chprofimg')</label><br>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--<input id="image" type="file" name="image">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<hr class="border-dark">--}}
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" style="color:#000;">@lang('content.nm')</label>
                                            <div class="col-lg-6">
                                                <input id="name" name="name" type="text" class="form-control"
                                                       value="{{$teacher->name ?? ""}}" minlength="2" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" style="color:#000;">@lang('content.eml')</label>
                                            <div class="col-lg-6">
                                                <input id="email" name="email" type="email" class="form-control"
                                                       value="{{$teacher->email ?? ""}}" required>
                                            </div>
                                        </div>

                                        {{--<div class="form-group">--}}
                                            {{--<label for="sex" class="col-lg-2 control-label" style="color:#000;">@lang('content.chgender')</label>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--<select style="height: 35px;" id="sex" name="sex" class="form-control">--}}
                                                    {{--<option value="0" selected="">@lang('content.notselected')</option>--}}
                                                    {{--<option value="1">@lang('content.male')</option>--}}
                                                    {{--<option value="2">@lang('content.fem')</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="phone" class="col-lg-2 control-label" style="color:#000;">Mobile</label>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--<input id="phone" name="phone" type="number" class="form-control"--}}
                                                       {{--value="{{$user->phone ?? ""}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="dob" class="col-lg-2 control-label" style="color:#000;">Birthday (dd/mm/yy)</label>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--<input id="dob" name="dob" type="date" class="form-control"--}}
                                                       {{--value="{{$user->dob ?? ""}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="skills" class="col-lg-2 control-label" style="color:#000;">@lang('content.skills')</label>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--<input id="skills" name="skills" type="text" class="form-control"--}}
                                                       {{--value="{{$user->skills ?? ""}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="hobbies" class="col-lg-2 control-label" style="color:#000;">@lang('content.hobbies')</label>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--<input id="hobbies" name="hobbies" type="text" class="form-control"--}}
                                                       {{--value="{{$user->hobbies ?? ""}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="signature" class="col-lg-2 control-label" style="color:#000;">@lang('content.signature')</label>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--<input id="signature" name="signature" type="text" class="form-control"--}}
                                                       {{--value="{{$user->signature ?? ""}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="status" class="col-lg-2 control-label" style="color:#000;">@lang('content.status')</label>--}}
                                            {{--<div class="col-lg-6">--}}
                                                {{--<input id="status" name="status" type="text" class="form-control"--}}
                                                       {{--value="{{$user->status ?? ""}}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                {{--<button type="button" class="btn btn-danger">Cancel</button>--}}
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
