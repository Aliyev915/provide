<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3">
                <a href="{{ route('home') }}" class="footer-logo"><img src="{{ asset('assets/images/logo.png') }}"/></a>
                <p class="footer-text">{{ __('lang.footer_text') }}</p>
            </div>
            <div class="col-12 col-sm-6 col-lg-2">
                <h5>{{ __('lang.about_company') }}</h5>
                <ul>
                    <li><a href="{{ route('service') }}">{{ __('lang.services') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('lang.about_us') }}</a></li>
                    <li><a href="{{ route('blog') }}">{{ __('lang.blog') }}</a></li>
                    <li><a href="{{ route('vacancy') }}">{{ __('lang.vacancies') }}</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <h5>{{ __('lang.our_services') }}</h5>
                <ul>
                    <li><a href="services.html">Satınalma Auditi</a></li>
                    <li><a href="services.html">Satınalma və Təchizat üzrə</a></li>
                    <li><a href="services.html">Logistika və Gömrük</a></li>
                    <li><a href="about.html">Proqramlaşdırma və İT Xidməti</a></li>
                    <li><a href="news.html">Konsultasiya Xidmətimiz</a></li>
                    <li><a href="vacancy.html">Satış Xidmətimiz</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 footer-contact">
                <h5>{{ __('lang.contact') }}</h5>
                <ul>
                    <li><a href="tel:+994559876543">+994 55 9876543</a></li>
                    <li><a href="mailto:contact@providesolution.az">contact@providesolution.az</a></li>
                    <li><a href="" class="footer-btn">{{ __('lang.meeting') }}</a></li>
                </ul>
               
                
                
            </div>
        </div>
        <div class="copyright">
            <p>© 2022 ProvideSolutions.az. Müəllif hüquqları qorunur.</p>
            <a href="https://jedai.az/az/saytlarin-hazirlanmasi" target="blank">Site By <img src="{{ asset('assets/images/Jedai-logo-blue.png') }}"></a>
        </div>
    </div>
</footer>