@extends('layouts.layout')

@section('content')
    <section id="vacancy">
        <div class="container">
            <ul id="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('lang.homepage') }}</a></li>
                <li> <i class="fas fa-circle"></i> {{ __('lang.vacancies') }}</li>
            </ul>
            <div class="row">
                <div class="col-lg-5" data-aos="fade-up">
                    <div class="right-block">
                        <img src="{{ asset('assets/images/team.jpg') }}" class="right-block-img" />

                        <div class="right-block-box">
                            <div class="right-block-icon">
                                <img src="{{ asset('assets/images/vacancy.png') }}" />
                            </div>
                            <div class="right-block-text">
                                <span>{{ count($vacancies) }}</span>
                                <span>{{ __('lang.active_vacancies') }}</span>
                            </div>
                        </div>
                        <span class="bg"></span>
                    </div>

                </div>
                <div class="col-lg-7">
                    @foreach ($vacancies as $vacancy)
                        <div class="vacancy-card" data-aos="fade-up">
                            <a href="{{ route('vacancy-single',$vacancy->id) }}" class="card-link"></a>
                            <div class="card-icon">
                                <img src="{{ asset('assets/images/vacancy.png') }}" />
                            </div>
                            <div class="card-info">
                                <div>
                                    <p class="card-title">{{ $vacancy->langs->firstWhere('lang',app()->getLocale())->title }}</p>
                                    <button class="button-grey">
                                        {{ __('lang.apply') }}
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <p class="card-subtitle">Bu xidmət partnyor şirkətin satınalma sifarişlərinin izlənilməsi
                                    və
                                    yoxlanılması</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="vacancy-modal">
        @include('includes.vacancy-modal')
    </div>
@endsection
