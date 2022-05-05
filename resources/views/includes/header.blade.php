<!-- Header -->
<header>
    <div class="container">
        <a class="logo" href="{{ route('home') }}">
            <img src="{{ asset('uploads/' . $setting->header_logo) }}" />
        </a>
        <nav>
            <div>
                <ul class="menu">
                    <li class="dropdown">
                        <a href="{{ route('service') }}">{{ __('lang.services') }}</a>
                        <i class="fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            @foreach ($services as $service)
                                <li><a
                                        href="{{ route('service-single', $service->langs->firstWhere('lang', $lang)->slug) }}">{{ $service->langs->firstWhere('lang', $lang)->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">{{ __('lang.about_us') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('vacancy') }}">{{ __('lang.vacancies') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">{{ __('lang.contact') }}</a>
                    </li>
                </ul>
                <div class="mobile-contact">
                    <a href="" class="mobile-link">
                        <div><img src="{{ asset('assets/images/mobile-icon.png') }}"></div>{{ __('lang.login') }}
                    </a>
                    @foreach ($setting->phones as $phone)
                        <a href="tel:{{ str_replace(' ', '', $phone) }}"
                            class="mobile-tel">{{ $phone }}</a>
                    @endforeach
                    <a href="mailto: {{ $setting->email }}" class="mobile-tel">{{ $setting->email }}</a>
                    <div class="mobile-social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="lang-mobile">
                    <a href="az" class="active"><img
                            src="{{ asset('assets/images/az.png') }}" />Azerbaijan</a>
                    <a href="en"><img src="{{ asset('assets/images/en.png') }}" />English</a>
                    <a href="ru"><img src="{{ asset('assets/images/ru.png') }}" />Rus</a>
                </div>

            </div>

        </nav>
        <div class="header-right">
            <div class="header-phone-div">
                <div class="header-contact"><img src="{{ asset('assets/images/tel.png') }}"></div>
                <div class="header-phone-container">
                    <i class="fas fa-times"></i>
                    <div class="header-phone-popup">
                        <div>
                            <div class="block-icon">
                                <img src="{{ asset('assets/images/sun.png') }}" />
                            </div>
                            <div class="phone-block-info">
                                <h4>{{ __('lang.new_idea') }}</h4>
                                @foreach ($setting->phones as $phone)
                                    <a href="tel:{{ str_replace(' ', '', $phone) }}"
                                        class="mobile-tel">{{ $phone }}</a>
                                @endforeach
                                <a href="mailto: {{ $setting->email }}"
                                    class="mobile-tel">{{ $setting->email }}</a>
                            </div>
                        </div>
                        <div>
                            <div class="block-icon">
                                <img src="{{ asset('assets/images/favicon.png') }}" />
                            </div>
                            <div class="phone-block-info">
                                <h4>{{ __('lang.apply_for') }}</h4>
                                @foreach ($setting->phones as $phone)
                                    <a href="tel:{{ str_replace(' ', '', $phone) }}"
                                        class="mobile-tel">{{ $phone }}</a>
                                @endforeach
                                <a href="mailto: {{ $setting->email }}"
                                    class="mobile-tel">{{ $setting->email }}</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="menu-btn">
                <span></span>
            </div>


            <a href="" class="header-login">{{ __('lang.login') }}</a>
            <ul class="lang">
                <li>Aze</li>
                <div class="lang-div">
                    <a href="az"><img src="{{ asset('assets/images/az.png') }}" />Azerbaijan</a>
                    <a href="en"><img src="{{ asset('assets/images/en.png') }}" />English</a>
                    <a href="ru"><img src="{{ asset('assets/images/ru.png') }}" />Rus</a>
                </div>
            </ul>
        </div>

    </div>
</header>
