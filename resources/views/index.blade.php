@extends('layouts.layout')

@section('content')
    <!-- Home -->
    <section id="home">
        <div class="container">
            <div class="home-text">
                <h2>{{ __('lang.home_title') }}</h2>
                <p>{{ __('lang.home_text') }}</p>
                <div class="home-btn">
                    <a href="#services">
                        <i class="fas fa-arrow-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services">
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-4" data-aos="fade-up">
                    <div class="title-div">
                        <span>01</span>
                        <h2 class="title">{{ __('lang.what_we_suggest') }}</h2>
                    </div>
                    <p class="services-text">{{ __('lang.what_we_suggest_text') }}</p>
                    <div class="services-btn">
                        <a href="{{ route('service') }}" class="button">{{ __('lang.our_services') }}</a>
                        <a href="{{ route('about') }}" class="button">{{ __('lang.about_company') }}</a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7" data-aos="fade-up">
                    <div class="swiper mySwiper-4">
                        <div class="swiper-wrapper">
                            @foreach ($services as $service)
                                <div class="services-card swiper-slide">
                                    <a href="{{ route('service-single', $service->langs->firstWhere('lang', app()->getLocale())->slug) }}"
                                        class="card-link"></a>
                                    <img src="{{ asset('uploads/services/' . $service->image) }}" />
                                    <div class="card-overlay">
                                        <div class="overlay-text">
                                            <p class="services-title">
                                                {{ $service->langs->firstWhere('lang', app()->getLocale())->title }}</p>
                                            <p class="services-subtitle">
                                                {{ $service->langs->firstWhere('lang', app()->getLocale())->content }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section id="partner">
        <div class="container">
            <div class="title-div" data-aos="fade-up">
                <span>02</span>
                <h2 class="title">{{ __('lang.our_partners') }}</h2>
            </div>
            <div class="swiper mySwiper-3" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach ($partners as $partner)
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('uploads/partners/' . $partner->image) }}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Works -->
    <section id="works">
        <div class="container">
            <div class="title-div" data-aos="fade-up">
                <span>03</span>
                <h2 class="title">{{ __('lang.activity_areas') }}</h2>
            </div>
            <div class="row">
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="card card-green">
                        <a href="single-service.html" class="works-link-1"></a>
                        <p class="works-link"><span>{{ __('lang.more') }}</span> <i class="fas fa-angle-right"></i>
                        </p>
                        <img src="{{ asset('assets/images/line-green.png') }}" />
                        <p class="work-title">İstehsalat</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="card card-blue">
                        <a href="single-service.html" class="works-link-1"></a>
                        <p class="works-link"><span>{{ __('lang.more') }}</span> <i class="fas fa-angle-right"></i>
                        </p>
                        <img src="{{ asset('assets/images/line-blue.png') }}" />
                        <p class="work-title">Neft-qaz</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="card card-green1">
                        <a href="single-service.html" class="works-link-1"></a>
                        <p class="works-link"><span>{{ __('lang.more') }}</span> <i class="fas fa-angle-right"></i>
                        </p>
                        <img src="{{ asset('assets/images/line-green1.png') }}" />
                        <p class="work-title">İnformasiya Texnologiyaları</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="card card-purple">
                        <a href="single-service.html" class="works-link-1"></a>
                        <p class="works-link"><span>{{ __('lang.more') }}</span> <i class="fas fa-angle-right"></i>
                        </p>
                        <img src="{{ asset('assets/images/line-purple.png') }}" />
                        <p class="work-title">Tibb</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About us -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6" data-aos="fade-up">
                    <div class="title-div" data-aos="fade-up">
                        <span>04</span>
                        <h2 class="title">10 {{ __('lang.experience_year') }}</h2>
                    </div>
                    <p>{{ __('lang.exp_text_1') }}</p>
                    <p>{{ __('lang.exp_text_2') }}</p>
                    <a href="about.html" class="button">{{ __('lang.about_company') }}</a>
                </div>
                <div class="col-12 col-md-12 col-lg-6" data-aos="fade-up">
                    <div class="right-block">
                        <img src="{{ asset('assets/images/team.jpg') }}" class="right-block-img" />
                        <div class="right-block-box">
                            <div class="right-block-icon">
                                <img src="{{ asset('assets/images/favicon.png') }}" />
                            </div>
                            <div class="right-block-text">
                                <span>100+</span>
                                <span>{{ __('lang.satisfied_customer') }}</span>
                            </div>
                        </div>
                        <div class="right-block-box">
                            <div class="right-block-icon">
                                <img src="{{ asset('assets/images/favicon.png') }}" />
                            </div>
                            <div class="right-block-text">
                                <span>42</span>
                                <span>{{ __('lang.official_partner') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rewiev -->
    <section id="review">
        <div class="container">
            <div class="title-div" data-aos="fade-up">
                <span>05</span>
                <h2 class="title">{{ __('lang.testimotional') }}</h2>
            </div>
            <div class="swiper mySwiper-2" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach ($imotionals as $imotional)
                        <div class="review-card swiper-slide">
                            <p class="review-text">
                                {{ $imotional->langs->firstWhere('lang', app()->getLocale())->text }}</p>
                            <div class="review-images">
                                <img src="{{ asset('uploads/imotionals/' . $imotional->image) }}" class="review-img">
                                <img src="{{ asset('uploads/imotionals/' . $imotional->company_icon) }}"
                                    class="review-logo">
                            </div>
                            <div class="review-bottom">
                                <h5>{{ $imotional->langs->firstWhere('lang', app()->getLocale())->name }}</h5>
                                <p>{{ $imotional->langs->firstWhere('lang', app()->getLocale())->profession }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- News -->
    <section id="news">
        <div class="container">
            <div class="title-div" data-aos="fade-up">
                <span>06</span>
                <h2 class="title">{{ __('lang.most_read_articles') }}</h2>
            </div>
            <div class="swiper mySwiper" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach ($blogs as $blog)
                        <div class="news-card swiper-slide">
                            <a href="{{ route('blog-single', $blog->langs->firstWhere('lang', app()->getLocale())->slug) }}"
                                class="card-link"></a>
                            <img src="{{ asset('uploads/blogs/' . $blog->images->first()->image) }}" />
                            <div class="card-overlay">
                                <div class="overlay-text">
                                    <span
                                        class="news-time">{{ \Carbon\Carbon::parse($blog->time)->format('d.m.Y') }}</span>
                                    <p class="news-title">
                                        {{ $blog->langs->firstWhere('lang', app()->getLocale())->title }}</p>
                                    <p class="news-subtitle">
                                        {{ $blog->langs->firstWhere('lang', app()->getLocale())->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe -->
    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" data-aos="fade-up">
                    <h3>{{ __('lang.subscribe_title') }}</h3>
                    <p>{{ __('lang.subscribe_text') }}</p>
                    <form data-aos="fade-up" method="POST" action="{{ route('subscribe') }}">
                        @csrf
                        <input type="email" name="email" placeholder="example@gmail.com">
                        <button type="submit">{{ __('lang.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
