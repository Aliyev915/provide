@extends('layouts.layout')

@section('content')
    <section id="about-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up">
                    <ul id="breadcrumb">
                        <li><a href="index.html">{{ __('lang.homepage') }}</a></li>
                        <li> <i class="fas fa-circle"></i> {{ __('lang.about_us') }}</li>
                    </ul>
                    <h2 class="title">{{ __('lang.header_title') }}</h2>
                    <p class="about-subtitle">{{ __('lang.header_text') }}</p>
                    <a href="{{ route('about') }}" class="button-grey">{{ __('lang.about_company') }}</a>
                </div>

                <div class="col-lg-6 right-block" data-aos="fade-up">
                    <img src="{{ asset('assets/images/haqqimizda.jpg')}}" class="right-block-img" />
                    <div class="right-block-box">
                        <div class="right-block-icon">
                            <img src="{{ asset('assets/images/favicon.png')}}" />
                        </div>
                        <div class="right-block-text">
                            <span>100+</span>
                            <span>{{ __('lang.satisfied_customer') }}</span>
                        </div>
                    </div>
                    <div class="right-block-box">
                        <div class="right-block-icon">
                            <img src="{{ asset('assets/images/favicon.png')}}" />
                        </div>
                        <div class="right-block-text">
                            <span>42</span>
                            <span>{{ __('lang.official_partner') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="company-year">

                <div class="title-div" data-aos="fade-up">
                    <h2 class="title">{{ __('lang.about_company') }}</h2>
                </div>

                <div class="swiper mySwiper-5" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <div class="company-card swiper-slide">
                            <img src="{{ asset('assets/images/year.jpg')}}" />
                            <div class="company-year-text">
                                <p class="company-title">2018</p>
                                <p class="company-year-text">{{ __('lang.about_2018') }} </p>
                            </div>
                        </div>
                        <div class="company-card swiper-slide">
                            <img src="{{ asset('assets/images/year.png')}}" />
                            <div class="company-year-text">
                                <p class="company-title">2019</p>
                                <p class="company-year-text">{{ __('lang.about_2019') }}</p>
                            </div>
                        </div>
                        <div class="company-card swiper-slide">
                            <img src="{{ asset('assets/images/year.png')}}" />
                            <div class="company-year-text">
                                <p class="company-title">2020</p>
                                <p class="company-year-text">{{ __('lang.about_2020') }}</p>
                            </div>
                        </div>
                        <div class="company-card swiper-slide">
                            <img src="{{ asset('assets/images/year.png')}}" />
                            <div class="company-year-text">
                                <p class="company-title">2021</p>
                                <p class="company-year-text">{{ __('lang.about_2021') }}</p>
                            </div>
                        </div>
                        <div class="company-card swiper-slide">
                            <img src="{{ asset('assets/images/year.png')}}" />
                            <div class="company-year-text">
                                <p class="company-title">2022</p>
                                <p class="company-year-text">{{ __('lang.about_2022') }}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div id="works">

                <h2 class="title" data-aos="fade-up">{{ __('lang.activity_areas') }}</h2>
                <div class="row">
                    <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                        <div class="card card-green">
                            <a href="single-service.html" class="works-link-1"></a>
                            <p class="works-link"><span>{{ __('lang.more') }}</span> <i class="fas fa-angle-right"></i></p>
                            <img src="{{ asset('assets/images/line-green.png')}}"/>
                            <p class="work-title">İstehsalat</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                        <div class="card card-blue">
                            <a href="single-service.html" class="works-link-1"></a>
                            <p class="works-link"><span>{{ __('lang.more') }}</span> <i class="fas fa-angle-right"></i></p>
                            <img src="{{ asset('assets/images/line-blue.png')}}"/>
                            <p class="work-title">Neft-qaz</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                        <div class="card card-green1">
                            <a href="single-service.html" class="works-link-1"></a>
                            <p class="works-link"><span>{{ __('lang.more') }}</span> <i class="fas fa-angle-right"></i></p>
                            <img src="{{ asset('assets/images/line-green1.png')}}"/>
                            <p class="work-title">İnformasiya Texnologiyaları</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up">
                        <div class="card card-purple">
                            <a href="single-service.html" class="works-link-1"></a>
                            <p class="works-link"><span>{{ __('lang.more') }}</span> <i class="fas fa-angle-right"></i></p>
                            <img src="{{ asset('assets/images/line-purple.png')}}"/>
                            <p class="work-title">Tibb</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="about-company">
                <div class="title-div" data-aos="fade-up">
                    <h2 class="title">{{ __('lang.what_we_know_title') }}</h2>
                </div>
                <p class="company-text" data-aos="fade-up">
                    {{ __('lang.what_we_know_text_1') }}
                </p>
                <p class="company-text" data-aos="fade-up">
                    {{ __('lang.what_we_know_text_2') }}
                </p>
            </div>

            <div id="review">
                <h2 class="title" data-aos="fade-up">{{ __('lang.testimotional') }}</h2>
                <div class="swiper mySwiper-2" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <div class="review-card swiper-slide">
                            <p class="review-text">“Provide Solutions ilə işləmək biznesimiz üçün verdiyimiz ən doğru
                                qərarlardan biri idi”</p>
                            <div class="review-images">
                                <img src="{{ asset('assets/images/review1.jpg')}}" class="review-img">
                                <img src="{{ asset('assets/images/review1.png')}}" class="review-logo">
                            </div>
                            <div class="review-bottom">
                                <h5>Vaqif Abbasov</h5>
                                <p>FOUNDER AT Google</p>
                            </div>
                        </div>
                        <div class="review-card swiper-slide">
                            <p class="review-text">“Provide Solutions ilə işləmək biznesimiz üçün verdiyimiz ən doğru
                                qərarlardan biri idi”</p>
                            <div class="review-images">
                                <img src="{{ asset('assets/images/review2.jpg')}}" class="review-img">
                                <img src="{{ asset('assets/images/review2.png')}}" class="review-logo">
                            </div>
                            <div class="review-bottom">
                                <h5>Vaqif Abbasov</h5>
                                <p>FOUNDER AT Google</p>
                            </div>
                        </div>
                        <div class="review-card swiper-slide">
                            <p class="review-text">“Provide Solutions ilə işləmək biznesimiz üçün verdiyimiz ən doğru
                                qərarlardan biri idi”</p>
                            <div class="review-images">
                                <img src="{{ asset('assets/images/review1.jpg')}}" class="review-img">
                                <img src="{{ asset('assets/images/review1.png')}}" class="review-logo">
                            </div>
                            <div class="review-bottom">
                                <h5>Vaqif Abbasov</h5>
                                <p>FOUNDER AT Google</p>
                            </div>
                        </div>
                        <div class="review-card swiper-slide">
                            <p class="review-text">“Provide Solutions ilə işləmək biznesimiz üçün verdiyimiz ən doğru
                                qərarlardan biri idi”</p>
                            <div class="review-images">
                                <img src="{{ asset('assets/images/review2.jpg')}}" class="review-img">
                                <img src="{{ asset('assets/images/review2.png')}}" class="review-logo">
                            </div>
                            <div class="review-bottom">
                                <h5>Vaqif Abbasov</h5>
                                <p>FOUNDER AT Google</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="subscribe">
                <div class="row">
                    <div class="col-lg-7" data-aos="fade-up">
                        <h3>{{ __('lang.subscribe_title') }}</h3>
                        <p>{{ __('lang.subscribe_text') }}</p>
                        <form data-aos="fade-up">
                            <input type="text" placeholder="example@gmail.com">
                            <button>{{ __('lang.send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Works -->

    </section>
@endsection
