<!-- Header -->
<header>
    <div class="container">
        <a class="logo" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.png') }}"/>
        </a>
        <nav>
            <div>
                <ul class="menu">
                    <li class="dropdown">
                        <a href="{{ route('service') }}">{{ __('lang.services') }}</a>
                        <i class="fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a href="">Satınalma auditi</a></li>
                            <li><a href="">Satınalma və Təchizat</a></li>
                            <li><a href="">Mobil tətbiqetmələr və veb-saytlar</a></li>
                            <li><a href="">Konsultasiya</a></li>
                            <li><a href="">Logistika və Gömrük</a></li>
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
                    <a href="" class="mobile-link"><div><img src="{{ asset('assets/images/mobile-icon.png') }}"></div>{{ __('lang.login') }}</a>
                    <a href="tel:+994509876541" class="mobile-tel">+994 50 9876541</a>
                    <a href="mailto: hey@providesolutions.com" class="mobile-tel">hey@providesolutions.com</a>
                    <div class="mobile-social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="lang-mobile">
                    <a href="az" class="active"><img src="{{ asset('assets/images/az.png') }}"/>Azerbaijan</a>
                    <a href="en"><img src="{{ asset('assets/images/en.png') }}"/>English</a>
                    <a href="ru"><img src="{{ asset('assets/images/ru.png') }}"/>Rus</a>
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
                                <img src="{{ asset('assets/images/sun.png') }}"/>
                            </div>
                            <div class="phone-block-info">
                                <h4>Yeni ideyan var?</h4>
                                <a href="tel:+994509876541">+994 50 9876541</a>
                                <a href="mailto:hey@providesolutions.com">hey@providesolutions.com</a>
                            </div>
                        </div>
                        <div>
                            <div class="block-icon">
                                <img src="{{ asset('assets/images/favicon.png') }}"/>
                            </div>
                            <div class="phone-block-info">
                                <h4>{{ __('lang.apply_for') }}</h4>
                                <a href="tel:+994509876541">+994 50 9876541</a>
                                <a href="mailto:contact@providesolutions.com">contact@providesolutions.com</a>
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
                    <a href="az"><img src="{{ asset('assets/images/az.png') }}"/>Azerbaijan</a>
                    <a href="en"><img src="{{ asset('assets/images/en.png') }}"/>English</a>
                    <a href="ru"><img src="{{ asset('assets/images/ru.png') }}"/>Rus</a>
                </div>
            </ul>
        </div>
        
    </div>
</header>