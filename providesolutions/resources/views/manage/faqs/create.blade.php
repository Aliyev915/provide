@extends('manage.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-10 offset-1 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Tez-tez verilən suallar</h4>
                        <div class="lang d-flex">
                            <a href="az" class="btn btn-success">AZ</a>
                            <a href="en" class="btn btn-success active">EN</a>
                            <a href="ru" class="btn btn-success">RU</a>
                        </div>
                    </div>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lang" id="lang" value="{{ app()->getLocale() }}">
                        <div class="translatable-content">
                            <div class="form-group">
                                <label for="exampleTextarea1">Sual</label>
                                <input type="hidden" name="question_lang" value='{"az":"","ru":"","en":""}'>
                                <textarea class="form-control" id="exampleTextarea1" rows="8" name="question"></textarea>
                                @error('question')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Cavab</label>
                                <input type="hidden" name="answer_lang" value='{"az":"","ru":"","en":""}'>
                                <textarea class="form-control" id="exampleTextarea1" rows="8" name="answer"></textarea>
                                @error('answer')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Save </button>
                        <a href="{{ route('faqs') }}" class="btn btn-light">Go Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('file-upload')
    <style>
        .upload-box {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }

        .image-box img {
            width: 200px;
            height: 100px;
        }

    </style>

    <script>
        $('.translatable-content textarea').on('keyup', function(e) {
            let lang = $('#lang').val();
            let value = $(this).val();
            let name = $(this).attr('name');
            let lang_val = JSON.parse($(this).prev().val());
            lang_val[lang] = value;
            $(this).prev().val(JSON.stringify(lang_val));
        });
        $('.lang a').on('click', function(e) {
            let title_lang = JSON.parse($('[name="question_lang"]').val());
            let description_lang = JSON.parse($('[name="answer_lang"]').val());
            console.log(title_lang);
            e.preventDefault();
            $('.lang').find('a').removeClass('active');
            $(this).addClass('active');
            let lang = $(this).attr('href');
            $('#lang').val(lang);
            $('[name="question"]').val(title_lang[lang]);
            $('[name="answer"]').val(description_lang[lang]);
        })
    </script>
@endsection
