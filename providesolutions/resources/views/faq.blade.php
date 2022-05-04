@extends('layouts.layout')

@section('content')
    <section id="faq">
        <div class="container">
            <ul id="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('lang.homepage') }}</a></li>
                <li> <i class="fas fa-circle"></i>{{ __('lang.faq') }}</li>
            </ul>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-5" data-aos="fade-up">
                    <div class="right-block">
                        <img src="{{ asset('assets/images/faq.jpg') }}" class="right-block-img" />
                        <div class="right-block-box">
                            <div class="right-block-icon">
                                <img src="{{ asset('assets/images/favicon.png') }}" />
                            </div>
                            <div class="right-block-text">
                                <span>50+</span>
                                <span>{{ __('lang.faq_text') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="accordion" id="accordion">
                        <div class="card" data-aos="fade-up">
                            <div class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse1" class="faq-link"
                                    aria-expanded="false">
                                    <div class="faq-div-1">
                                        <div class="faq-div-2">
                                            <i class="fas fa-question"></i>
                                            <i class="fas fa-minus"></i>
                                        </div>
                                    </div>
                                    <p>Satınalma Auditi nə deməkdir?</p>
                                </a>
                            </div>
                            <div id="collapse1" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Bu xidmət partnyor şirkətin satınalma sifarişlərinin izlənilməsi və yoxlanılmasından
                                        ibarətdir.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card" data-aos="fade-up">
                            <div class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse2" class="faq-link"
                                    aria-expanded="false">
                                    <div class="faq-div-1">
                                        <div class="faq-div-2">
                                            <i class="fas fa-question"></i>
                                            <i class="fas fa-minus"></i>
                                        </div>
                                    </div>
                                    <p>Satınalma Auditi nə deməkdir?</p>

                                </a>
                            </div>
                            <div id="collapse2" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Bu xidmət partnyor şirkətin satınalma sifarişlərinin izlənilməsi və yoxlanılmasından
                                        ibarətdir.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card" data-aos="fade-up">
                            <div class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse3" class="faq-link"
                                    aria-expanded="false">
                                    <div class="faq-div-1">
                                        <div class="faq-div-2">
                                            <i class="fas fa-question"></i>
                                            <i class="fas fa-minus"></i>
                                        </div>
                                    </div>
                                    <p>Satınalma Auditi nə deməkdir?</p>

                                </a>
                            </div>
                            <div id="collapse3" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Bu xidmət partnyor şirkətin satınalma sifarişlərinin izlənilməsi və yoxlanılmasından
                                        ibarətdir.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
