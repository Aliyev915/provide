@extends('manage.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-10 offset-1 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Vakansiyalar</h4>
                        <div class="lang d-flex">
                            <a href="az" class="btn btn-success {{ app()->isLocale('az') ? 'active' : '' }}">AZ</a>
                            <a href="en" class="btn btn-success {{ app()->isLocale('en') ? 'active' : '' }}">EN</a>
                            <a href="ru" class="btn btn-success {{ app()->isLocale('ru') ? 'active' : '' }}">RU</a>
                        </div>
                    </div>

                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lang" id="lang" value="{{ app()->getLocale() }}">

                        <div class="translatable-content">
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="hidden" name="title_lang"
                                    value='{"az":"{{ $vacancy->langs->firstWhere('lang', 'az')->title }}","ru":"{{ $vacancy->langs->firstWhere('lang', 'ru')->title }}","en":"{{ $vacancy->langs->firstWhere('lang', 'en')->title }}"}'>
                                <input type="text" class="form-control" id="exampleInputName1" name="title"
                                    placeholder="Title"
                                    value="{{ $vacancy->langs->firstWhere('lang', app()->getLocale())->title }}" />
                                @error('title')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description AZ</label>
                                <textarea name="description_az" id="editor"
                                    rows="20">{{ $vacancy->langs->firstWhere('lang', 'az')->description }}</textarea>
                                @error('description_az')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description EN</label>
                                <textarea name="description_en" id="editor1"
                                    rows="20">{{ $vacancy->langs->firstWhere('lang', 'en')->description }}</textarea>
                                @error('description_en')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description RU</label>
                                <textarea name="description_ru" id="editor2"
                                    rows="20">{{ $vacancy->langs->firstWhere('lang', 'ru')->description }}</textarea>
                                @error('description_ru')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ $vacancy->email }}">
                            @error('email')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input type="date" class="form-control" name="start_date"
                                        value="{{ \Carbon\Carbon::parse($vacancy->start_date)->format('Y-m-d') }}" />
                                    @error('start_date')
                                        <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <input type="date" class="form-control" name="end_date"
                                        value="{{ \Carbon\Carbon::parse($vacancy->end_date)->format('Y-m-d') }}" />
                                    @error('end_date')
                                        <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Save </button>
                        <a href="{{ route('vacancies') }}" class="btn btn-light">Go Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('file-upload')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
    </script>

    <script>
        $('.translatable-content input').on('keyup', function(e) {
            let lang = $('#lang').val();
            let value = $(this).val();
            let name = $(this).attr('name');
            let lang_val = JSON.parse($(this).prev().val());
            lang_val[lang] = value;
            $(this).prev().val(JSON.stringify(lang_val));
        });

        $('.translatable-content textarea').on('keyup', function(e) {
            let lang = $('#lang').val();
            let value = $(this).val();
            let name = $(this).attr('name');
            let lang_val = JSON.parse($(this).prev().val());
            lang_val[lang] = value;
            $(this).prev().val(JSON.stringify(lang_val));
        });
        $('.lang a').on('click', function(e) {
            e.preventDefault();
            let title_lang = JSON.parse($('[name="title_lang"]').val());
            $('.lang').find('a').removeClass('active');
            $(this).addClass('active');
            let lang = $(this).attr('href');
            $('#lang').val(lang);
            $('[name="title"]').val(title_lang[lang]);
        })
    </script>
@endsection
