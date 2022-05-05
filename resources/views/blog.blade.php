@extends('layouts.layout')

@section('content')
    <section id="blog">
        <div class="container">
            <ul id="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('lang.homepage') }}</a></li>
                <li> <i class="fas fa-circle"></i> {{ __('lang.blog') }}</li>
            </ul>
            <div class="title-div" data-aos="fade-up">
                <h2 class="title">{{ __('lang.most_read_articles') }}</h2>
            </div>
            <div id="news">

                <div class="swiper mySwiper" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <div class="news-card swiper-slide">
                            <a href="news-single.html" class="card-link"></a>
                            <img src="{{ asset('assets/images/team.jpg') }}" />
                            <div class="card-overlay">
                                <div class="overlay-text">
                                    <span class="news-time">24.03.2022</span>
                                    <p class="news-title">Business & Work</p>
                                    <p class="news-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's</p>
                                </div>
                            </div>
                        </div>
                        <div class="news-card swiper-slide">
                            <a href="news-single.html" class="card-link"></a>
                            <img src="{{ asset('assets/images/team.jpg') }}" />
                            <div class="card-overlay">
                                <div class="overlay-text">
                                    <span class="news-time">24.03.2022</span>
                                    <p class="news-title">Business & Work</p>
                                    <p class="news-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's</p>
                                </div>
                            </div>
                        </div>
                        <div class="news-card swiper-slide">
                            <a href="news-single.html" class="card-link"></a>
                            <img src="{{ asset('assets/images/team.jpg') }}" />
                            <div class="card-overlay">
                                <div class="overlay-text">
                                    <span class="news-time">24.03.2022</span>
                                    <p class="news-title">Business & Work</p>
                                    <p class="news-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's</p>
                                </div>
                            </div>
                        </div>
                        <div class="news-card swiper-slide">
                            <a href="news-single.html" class="card-link"></a>
                            <img src="{{ asset('assets/images/team.jpg') }}" />
                            <div class="card-overlay">
                                <div class="overlay-text">
                                    <span class="news-time">24.03.2022</span>
                                    <p class="news-title">Business & Work</p>
                                    <p class="news-subtitle">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="title-div title-2" data-aos="fade-up">
                <h2 class="title">{{ __('lang.all_articles') }}</h2>
            </div>
            <div class="row blog-list">
                @foreach ($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="news-card">
                            <a href="{{ route('blog-single',$blog->langs->firstWhere('lang',app()->getLocale())->title) }}" class="card-link"></a>
                            <img src="{{ asset('uploads/blogs/'.$blog->images->first()->image) }}" />
                            <div class="card-overlay">
                                <div class="overlay-text">
                                    <span class="news-time">{{ \Carbon\Carbon::parse($blog->time)->format('m.d.Y') }}</span>
                                    <p class="news-title">{{ $blog->langs->firstWhere('lang',app()->getLocale())->title }}</p>
                                    <p class="news-subtitle">{{ $blog->langs->firstWhere('lang',app()->getLocale())->content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
