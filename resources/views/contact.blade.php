@extends('layouts.layout')

@section('content')
    <section id="contact">

        <div class="container">
            <ul id="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('lang.homepage') }}</a></li>
                <li> <i class="fas fa-circle"></i> {{ __('lang.contact') }}</li>
            </ul>

            <div class="contact-img" data-aos="fade-up">
                <img src="{{ asset('assets/images/contact.jpg') }}">
            </div>
            <div class="contact-title">
                <h2 class="title" data-aos="fade-up">{{ __('lang.contact_title') }}</h2>
                <p class="contact-subtitle" data-aos="fade-up">{{ __('lang.contact_text') }}</p>
                <div class="buttons" data-aos="fade-up">
                    @foreach ($setting->phones as $phone)
                        <a href="tel:{{ str_replace(' ','',$phone) }}" class="button-grey"><img
                                src='{{ asset('assets/images/phone-1.png') }}'>{{$phone}}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="contact-help" data-aos="fade-up">
            <div class="bg"></div>
            <div class="container">
                <h2 class="title">Sizə hansı mövzularda kömək edə bilərik?</h2>
                <div class="contact-boxes">
                    <div class="contact-box" data-aos="fade-up">
                        <div class="box-icon"><img src='{{ asset('assets/images/blue.png') }}' /></div>
                        <p class="box-title">Satınalma Auditi</p>
                        <p class="box-subtitle">Bu xidmət partnyor şirkətin satınalma sifarişlərinin izlənilməsi və
                            yoxlanılmasından ibarətdir.</p>
                    </div>
                    <div class="contact-box" data-aos="fade-up">
                        <div class="box-icon"><img src='{{ asset('assets/images/blue.png') }}' /></div>
                        <p class="box-title">Logistika və Gömrük</p>
                        <p class="box-subtitle">Logistika/Gömrük xidmətinə xarici ölkədən idxal olunacaq yüklərin
                            daşınması və gömrüklənmə prosesi daxildir.</p>
                    </div>
                    <div class="contact-box" data-aos="fade-up">
                        <div class="box-icon"><img src='{{ asset('assets/images/blue.png') }}' /></div>
                        <p class="box-title">Konsultasiya Xidmətimiz</p>
                        <p class="box-subtitle">Konsultasiya Xidmətimiz partnyorun tələbinə əsasən təklif edilir.</p>
                    </div>
                    <div class="contact-box" data-aos="fade-up">
                        <div class="box-icon"><img src='{{ asset('assets/images/blue.png') }}' /></div>
                        <p class="box-title">Satış Xidmətimiz</p>
                        <p class="box-subtitle">Provide Solutions şirkəti partnyorlara bu xidməti satışlarının
                            optimallaşdırılması məqsədini güdərək təqdim edir.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-8" data-aos="fade-up">
                        <form method="POST">
                            @csrf
                            <div>
                                <label>{{ __('lang.name_surname') }}</label>
                                <input class="form-control" placeholder="{{ __('lang.name_surname') }}">

                            </div>
                            <div>
                                <label>{{ __('lang.mail') }}</label>
                                <input class="form-control" placeholder="{{ __('lang.mail') }}">
                            </div>
                            <div>
                                <label>{{ __('lang.phone') }}</label>
                                <input class="form-control" placeholder="+994 50 670 77 77">
                            </div>
                            <div>
                                <label>{{ __('lang.service') }}</label>
                                <select>
                                    <option>Xidmet novu</option>
                                    <option>Xidmet 1</option>
                                    <option>Xidmet 2</option>
                                    <option>Xidmet novu</option>
                                </select>
                            </div>
                            <textarea class="form-control" placeholder="{{ __('lang.note_your_apply') }}"></textarea>
                            <div class="form-btn">
                                <button class="button">{{ __('lang.send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
