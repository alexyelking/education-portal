<div class="card-body">
    <div class="form-group">
        <label for="title">@lang('content.headline')</label>
        <input type="text" class="form-control" name="title" maxlength="35"
               value="{{$course->title ?? ""}}" required>
    </div>
    <div class="form-group">
        <label for="slug">@lang('content.slug')</label>
        <input class="form-control" type="text" name="slug"
               value="{{$course->slug ?? ""}}" readonly="">
    </div>
    <div class="form-group">
        <label for="description_short">@lang('content.shortdescription')</label>
        <textarea class="form-control" id="description_short" maxlength="300"
                  name="description_short" required>{{$course->description_short ?? ""}}</textarea>
    </div>
    <div class="form-group">
        <label for="description">@lang('content.fulldescription')</label>
        <textarea class="form-control" id="description" name="description"
                  required>{{$course->description ?? ""}}</textarea>
    </div>
    <div class="form-group">
        <label for="tags">@lang('content.tagsns')</label>
        <input type="text" class="form-control" name="tags"
               value="{{$course->tags ?? ""}}">
    </div>
    <div class="form-group">
        <label for="video">@lang('content.linktovideo')</label>
        <textarea class="form-control" id="video" maxlength="300"
                  name="video">{{$course->video ?? ""}}</textarea>
    </div>
    <div class="form-group">
        <label for="cost">@lang('content.setcrsprice')</label>
        <input class="form-control" type="number" id="cost" max="100"
               name="cost" min="0" required value="{{$course->cost ?? ""}}">
    </div>
</div>