<section class="fact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 fact-item">
                <figure>
                    <img src="{{ asset('img/icons/1.png') }}" alt="">
                </figure>
                <h2>{{ $count = DB::table('users')->count()}}</h2>
                <p>@lang('content.newstudents')</p>
            </div>
            <div class="col-lg-3 col-sm-6 fact-item">
                <figure>
                    <img src="{{ asset('img/icons/2.png') }}" alt="">
                </figure>
                <h2>{{ $count = DB::table('users')->count()}}</h2>
                <p>@lang('content.gradstudents')</p>
            </div>
            <div class="col-lg-3 col-sm-6 fact-item">
                <figure>
                    <img src="{{ asset('img/icons/3.png') }}" alt="">
                </figure>
                <h2>{{ $count = DB::table('teachers')->count()}}</h2>
                <p>@lang('content.qualteachers')</p>
            </div>
            <div class="col-lg-3 col-sm-6 fact-item">
                <figure>
                    <img src="{{ asset('img/icons/4.png') }}" alt="">
                </figure>
                <h2>{{ $count = DB::table('courses')->count()}}</h2>
                <p>@lang('content.amazingcourses')</p>
            </div>
        </div>
    </div>
</section>
