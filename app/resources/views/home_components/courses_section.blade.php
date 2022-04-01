<section class="courses-section">
    <div class="container">
        <div class="sec-title text-center">
            <h1>@lang('content.otb'):</h1>
            <a id="courses"></a>
            <h3>@lang('content.courses')</h3>
            <h5>@lang('content.txtunderotb').</h5>
{{--            <h2>@lang('content.hm')</h2>--}}
            <h5>@lang('content.txtunderhm'). </h5>
        </div>
        <div class="course-slider owl-carousel"> <!--   -->
            <!-- course -->


            @foreach($courses as $course)
                <div class="course-item">
                    <figure class="course-preview">
                        @if(($course->image)!='#')
                            <img src="{{ asset($course->image )}}" alt="">
                        @else
                            <img src="{{ asset('img/no-photo.jpg') }}" alt="">
                        @endif
                        @if( $course->cost > 0)
                            <div class="price">${{ $course->cost }}</div>
                        @else
                            <div class="price">@lang('content.free')</div>
                        @endif
                    </figure>
                    <div class="course-content">
                        <div class="cc-text">
                            <h5><a href="{{route('course.show', $course->id)}}">{{ $course->title }}</a></h5>
                            <p>{{ $course->description_short }}</p>
                            <span><i class="flaticon-student-2"></i>20</span>
                            <span><i class="flaticon-placeholder"></i>3</span>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star i-fade"></i>
                            </div>
                        </div>
                        <div class="seller-info">
                            <div class="seller-pic set-bg" data-setbg="">
                                    <img alt="" src="{{ asset('img/teacher.jpg')}}" style="border-radius:30%">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
