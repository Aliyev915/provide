@extends('layouts.layout')

@section('content')
    <section id="services-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul id="breadcrumb">
                        <li><a href="{{ route('home') }}">{{ __('lang.homepage') }}</a></li>
                        <li> <i class="fas fa-circle"></i> {{ __('lang.services') }}</li>
                    </ul>
                    <h2 class="title" data-aos="fade-up">{{ __('lang.what_we_suggest') }}</h2>
                    <p class="services-subtitle" data-aos="fade-up">{{__('lang.what_we_suggest_text')}}</p>
                    <a href="" class="button" data-aos="fade-up">{{ __('lang.our_services') }}</a>
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
            <div class="services-info">
                <div class="card-1" data-aos="fade-up">
                    <div class="services-card">
                        <a href="services-single.html" class="card-link"></a>
                        <img src="{{ asset('assets/images/team.jpg') }}" />
                        <div class="card-overlay">
                            <div class="overlay-text">
                                <p class="services-title">Business & Work</p>
                                <p class="services-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-2" data-aos="fade-up">
                    <div class="services-card">
                        <a href="services-single.html" class="card-link"></a>
                        <img src="{{ asset('assets/images/team.jpg') }}" />
                        <div class="card-overlay">
                            <div class="overlay-text">
                                <p class="services-title">Business & Work</p>
                                <p class="services-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-3" data-aos="fade-up">
                    <div class="services-card">
                        <a href="services-single.html" class="card-link"></a>
                        <img src="{{ asset('assets/images/team.jpg') }}" />
                        <div class="card-overlay">
                            <div class="overlay-text">
                                <p class="services-title">Business & Work</p>
                                <p class="services-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-3" data-aos="fade-up">
                    <div class="services-card">
                        <a href="services-single.html" class="card-link"></a>
                        <img src="{{ asset('assets/images/team.jpg') }}" />
                        <div class="card-overlay">
                            <div class="overlay-text">
                                <p class="services-title">Business & Work</p>
                                <p class="services-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-2" data-aos="fade-up">
                    <div class="services-card">
                        <a href="services-single.html" class="card-link"></a>
                        <img src="{{ asset('assets/images/team.jpg') }}" />
                        <div class="card-overlay">
                            <div class="overlay-text">
                                <p class="services-title">Business & Work</p>
                                <p class="services-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-1" data-aos="fade-up">
                    <div class="services-card">
                        <a href="services-single.html" class="card-link"></a>
                        <img src="{{ asset('assets/images/team.jpg') }}" />
                        <div class="card-overlay">
                            <div class="overlay-text">
                                <p class="services-title">Business & Work</p>
                                <p class="services-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
