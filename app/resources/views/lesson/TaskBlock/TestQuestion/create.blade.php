@extends('layouts.app')

@section('content')

<section class="lesson-section set-bg fixed" data-setbg="{{ asset('img/bg.jpg') }}" >

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="hero-text text-white">
                <h3>@lang('content.crtestq')</h3>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="card col-md-10" style="padding:0">
            <div class="card-body">
                <form class="contact-form" action="{{ route('testQuestion.store', $taskBlock->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="task_block_id" value="{{ $taskBlock->id }}">
                    <input type="hidden" name="image_link" value="#">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <input  type="text" maxlength="1024" name="text" placeholder="@lang('content.pqt')"  required>
                            <div class="row col-md-6">
                                <input class="col-md-4" type="number" name="correct_count" value="1" required>
                                <label for="correct_count" ><h3>@lang('content.hmvars')?</h3></label>
                            </div>
                            <div class="row col-md-6">
                                <input class="col-md-4" type="number" name="wrong_count" value="3" required>
                                <label for="wrong_count" ><h3>@lang('content.hmwvars')?</h3></label>
                            </div>

                        </div>
                        <div class="col-md-7" >
                            <button class = "site-btn col-md-4" type="submit" value="create">@lang('content.add')<i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
</section>

@endsection
