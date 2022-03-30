<section id="newslatter" class="newslatter-section set-bg fixed"
         data-setbg="{{ asset('img/newslatter-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sec-title text-white sec-style-2">
                    <span>@lang('content.newsletter')</span>
                    <h2>@lang('content.stay updated')</h2>
                </div>
            </div>

            <div class="col-lg-9 nl-form-warp">
                <form class="newslatter-form">
                    <input type="text" placeholder="@lang('content.your') E-mail">
                    <button class="site-btn">@lang('content.subscribe') <i class="fa fa-angle-right"></i></button>
                </form>
                <p>@lang('content.sbstxt').</p>
            </div>
        </div>
    </div>
</section>
