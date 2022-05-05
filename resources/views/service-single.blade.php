@extends('layouts.layout')

@section('content')
    <section id="service-single">
        <div class="container">
            <ul id="breadcrumb">
                <li><a href="index.html">Ana Səhifə</a></li>
                <li> <a href="index.html"><i class="fas fa-circle"></i> Xidmətlər</a></li>
                <li> <i class="fas fa-circle"></i> Proqramlaşdırma IT</li>
            </ul>

            <h2 class="title" data-aos="fade-up">Proqramlaşdırma / IT</h2>
            <p class="service-subtitle" data-aos="fade-up">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab minima
                aperiam voluptates mollitia voluptas rerum obcaecati temporibus consectetur animi laboriosam?</p>

            <div class="progress-bar" data-aos="fade-up">
                <div class="progress-box">
                    <div class="progress-img issue">
                        <img src="{{ asset('assets/images/Ellipse 542.jpg') }}" />
                    </div>
                    <span>Issue</span>
                </div>
                <div class="progress-box solution">
                    <div class="progress-img">
                        <img src="{{ asset('assets/images/Ellipse 543.jpg') }}" />
                    </div>
                    <span>Solution</span>
                </div>
                <div class="progress-box testing">
                    <div class="progress-img">
                        <img src="{{ asset('assets/images/Ellipse 544.jpg') }}" />
                    </div>
                    <span>Testing</span>
                </div>
                <div class="progress-box production">
                    <div class="progress-img">
                        <img src="{{ asset('assets/images/Ellipse 545.png') }}" />
                    </div>
                    <span>Production</span>
                </div>
            </div>

            <div class="proccess-div" data-aos="fade-up">
                <div>
                    <p>The issue identification and set the proccess workflow</p>
                </div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div>
                    <p>Give a solution and testing it on people that being sure</p>
                </div>
            </div>

            <div id="works">
                <div class="row">
                    <div class="col-6 col-lg-3" data-aos="fade-up">
                        <div class="card card-blue">
                            <img src="{{ asset('assets/images/line-blue.png') }}" />
                            <p class="work-title">122</p>
                            <p class="work-subtitle">{{ __('lang.success_project') }}</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3" data-aos="fade-up">
                        <div class="card card-blue">
                            <img src="{{ asset('assets/images/line-blue.png') }}" />
                            <p class="work-title">122</p>
                            <p class="work-subtitle">{{ __('lang.experience_year') }}</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3" data-aos="fade-up">
                        <div class="card card-blue">
                            <img src="{{ asset('assets/images/line-blue.png') }}" />
                            <p class="work-title">122</p>
                            <p class="work-subtitle">{{ __('lang.expert') }}</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3" data-aos="fade-up">
                        <div class="card card-blue">
                            <img src="{{ asset('assets/images/line-blue.png') }}" />
                            <p class="work-title">122</p>
                            <p class="work-subtitle">{{ __('lang.national_project') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offer">
                <h2 class="title" data-aos="fade-up">{{ __('lang.what_we_suggest') }}</h2>
                <div class="offer-box">
                    <div class="offer-div" data-aos="fade-up">
                        <i class="fas fa-check"></i>
                        <span>Provide Solutions CRM</span>
                    </div>
                    <div class="offer-div" data-aos="fade-up">
                        <i class="fas fa-check"></i>
                        <span>Özəl proqramların hazırlanması</span>
                    </div>
                    <div class="offer-div" data-aos="fade-up">
                        <i class="fas fa-check"></i>
                        <span>S (Satış proqramı)</span>
                    </div>
                    <div class="offer-div" data-aos="fade-up">
                        <i class="fas fa-check"></i>
                        <span>SME/ERP (Kiçik və orta şirkətlərin idarəedilməsi)</span>
                    </div>
                    <div class="offer-div" data-aos="fade-up">
                        <i class="fas fa-check"></i>
                        <span>SCM (Təchizat zəncirinin idrəedilməsi)</span>
                    </div>
                    <div class="offer-div" data-aos="fade-up">
                        <i class="fas fa-check"></i>
                        <span>PM/TM (Layihə və tapşırıqların idarəedilməsi)</span>
                    </div>
                    <div class="offer-div" data-aos="fade-up">
                        <i class="fas fa-check"></i>
                        <span>Veb səhifələrin və aplikasiyaların hazırlanması</span>
                    </div>
                </div>
            </div>

            <div class="offer-bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="offer-text" data-aos="fade-up">
                            <p class="offer-title">Proqramlaşdırma</p>
                            <p class='offer-subtitle'>Xidmətə müştərinin istəyindən asılı olaraq aşağıdakı paket
                                proqramlarının tətbiqi daxildir</p>
                        </div>
                        <div class="offer-text" data-aos="fade-up">
                            <p class="offer-title">İT (İnformasiya Texnologiyaları)</p>
                            <p class='offer-subtitle'>İT avadanlıqların təchizatı və quraşdırılması, mövcud sistemin analizi
                                və yenidən quraşdırılması xidmətə daxildir</p>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="right-block">
                            <img src="{{ asset('assets/images/team.jpg') }}" class="right-block-img" />
                            <div class="right-block-box">
                                <div class="right-block-icon">
                                    <img src="{{ asset('assets/images/Vector.png') }}" />
                                </div>
                                <div class="right-block-text">
                                    <span>100+</span>
                                    <span>{{ __('lang.professional_expert') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="partner">
                <div class="title-div">
                    <h2 class="title" data-aos="fade-up">{{ __('lang.partners') }}</h2>
                </div>
                <div class="swiper mySwiper-3" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                        <div class="partner-img swiper-slide">
                            <img src="{{ asset('assets/images/partner.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
