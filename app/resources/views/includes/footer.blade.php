<!-- Footer section -->
<footer class="footer-section spad pb-0">
    <div class="container">
        <!-- div class="text-center">
        <a href="#" class="site-btn">Enroll Now <i class="fa fa-angle-right"></i></a>
        <div class="row text-white spad">
            <div class="col-lg-3 col-sm-6 footer-widget">
                <h4>Engeneering</h4>
                <ul>
                    <li><a href="#">Applied Studies</a></li>
                    <li><a href="#">Computer Engeneering</a></li>
                    <li><a href="#">Software Engeneering</a></li>
                    <li><a href="#">Informational Engeneering</a></li>
                    <li><a href="#">System Engeneering</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 footer-widget">
                <h4>Business School</h4>
                <ul>
                    <li><a href="#">Applied Studies</a></li>
                    <li><a href="#">Computer Engeneering</a></li>
                    <li><a href="#">Software Engeneering</a></li>
                    <li><a href="#">Informational Engeneering</a></li>
                    <li><a href="#">System Engeneering</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 footer-widget">
                <h4>Art & Design</h4>
                <ul>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">Motion Graphics & 3D</a></li>
                    <li><a href="#">Classichal Painting</a></li>
                    <li><a href="#">Sculpture</a></li>
                    <li><a href="#">Fashion Design</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 footer-widget">
                <h4>Higher Education</h4>
                <ul>
                    <li><a href="#">Applied Studies</a></li>
                    <li><a href="#">Computer Engeneering</a></li>
                    <li><a href="#">Software Engeneering</a></li>
                    <li><a href="#">Informational Engeneering</a></li>
                    <li><a href="#">System Engeneering</a></li>
                </ul>
            </div>
        </div -->
        <div class="footer-bottom">
            <!--<div class="social">
                <a href=""><i class="fa fa-pinterest"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-dribbble"></i></a>
                <a href=""><i class="fa fa-behance"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
            </div>-->
            <ul class="footer-menu">
                <li><a href="{{ route('home') }}#courses">@lang('content.courses')</a></li>
                <li><a href="{{ route('home') }}#about">@lang('content.about us')</a></li>
                <li><a href="{{ route('home') }}#newslatter">@lang('content.news')</a></li>
                <li><a href="{{ route('home') }}#contact">@lang('content.contact us')</a></li>
            </ul>
            <div class="footer-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo2.png') }}" alt="">
                </a>
                <!-- span style="color: #fff;">COM-Education</span -->
            </div>
        </div>
    </div>
</footer>
