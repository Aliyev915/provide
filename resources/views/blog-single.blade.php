@extends('layouts.layout')

@section('content')
    <section id="single-blog">
        <div class="blog-top">
            <div class="container">
                <div style="background: url('{{ asset('assets/images/single-blog.jpg') }}')"></div>
                <ul id="breadcrumb">
                    <li><a href="{{ route('home') }}">{{ __('lang.homepage') }}</a></li>
                    <li> <i class="fas fa-circle"></i> {{ __('lang.blog') }}</li>
                </ul>
                <div class="blog-bottom">
                    <div class="blog-info">
                        <p>#{{ __('lang.news') }}</p>
                        <span>24.03.2022</span>
                    </div>
                    <h2 class="blog-title">Various versions have evolved over the years</h2>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <p class="blog-text" data-aos="fade-up">Contrary to popular belief, Lorem Ipsum is not simply random
                        text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                        the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites
                        of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from
                        sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by
                        Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                        Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
                        section 1.10.32.</p>
                    <p class="blog-text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
                        those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are
                        also reproduced in their exact original form, accompanied by English versions from the 1914
                        translation by H. Rackham.</p>
                    <p class="blog-text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                        roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                        McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more
                        obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the
                        word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                        1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
                        written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                        Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
                        section 1.10.32.</p>
                    <p class="blog-text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
                        those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are
                        also reproduced in their exact original form, accompanied by English versions from the 1914
                        translation by H. Rackham.</p>
                </div>
                <div class="col-lg-4">
                    <div class="other-news">
                        <div class="news-card" data-aos="fade-up">
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
                        <div class="news-card" data-aos="fade-up">
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
        </div>
    </section>
@endsection
