<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3">
                <a href="{{ route('home') }}" class="footer-logo"><img
                        src="{{ asset('assets/images/logo.png') }}" /></a>
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
                    @foreach ($services as $service)
                        <li><a
                                href="{{ route('service-single', $service->langs->firstWhere('lang', $lang)->slug) }}">{{ $service->langs->firstWhere('lang', $lang)->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 footer-contact">
                <h5>{{ __('lang.contact') }}</h5>
                <ul>
                    <li>@foreach ($setting->phones as $phone)
                        <a href="tel:{{ str_replace(' ', '', $phone) }}"
                            class="mobile-tel">{{ $phone }}</a>
                    @endforeach</li>
                    <li><a href="mailto: {{ $setting->email }}" class="mobile-tel">{{ $setting->email }}</a></li>
                    <li><a href="" class="footer-btn">{{ __('lang.meeting') }}</a></li>
                </ul>



            </div>
        </div>
        <div class="copyright">
            <p>© 2022 ProvideSolutions.az. Müəllif hüquqları qorunur.</p>
            <a href="https://jedai.az/az/saytlarin-hazirlanmasi" target="blank">Site By <img
                    src="{{ asset('assets/images/Jedai-logo-blue.png') }}"></a>
        </div>
    </div>
</footer>
