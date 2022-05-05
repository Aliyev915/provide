@extends('manage.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-10 offset-1 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Əməkdaşlarımız</h4>
                        <div class="lang d-flex">
                            <a href="az" class="btn btn-success {{ app()->isLocale('az')?'active':'' }}">AZ</a>
                            <a href="en" class="btn btn-success {{ app()->isLocale('en')?'active':'' }}">EN</a>
                            <a href="ru" class="btn btn-success {{ app()->isLocale('ru')?'active':'' }}">RU</a>
                        </div>
                    </div>

                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lang" id="lang" value="{{ app()->getLocale() }}">

                        <div class="translatable-content">
                            <div class="form-group">
                                <label for="exampleInputName1">Fullname</label>
                                <input type="hidden" name="fullname_lang"
                                    value='{"az":"{{ $team->langs->firstWhere('lang', 'az')->fullname }}","ru":"{{ $team->langs->firstWhere('lang', 'ru')->fullname }}","en":"{{ $team->langs->firstWhere('lang', 'en')->fullname }}"}'>
                                <input type="text"
                                    value="{{ $team->langs->firstWhere('lang', app()->getLocale())->fullname }}"
                                    class="form-control" id="exampleInputName1" name="fullname" placeholder="Fullname" />
                                @error('fullname')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Profession</label>
                                <input type="hidden" name="profession_lang"
                                    value='{"az":"{{ $team->langs->firstWhere('lang', 'az')->profession }}","ru":"{{ $team->langs->firstWhere('lang', 'ru')->profession }}","en":"{{ $team->langs->firstWhere('lang', 'en')->profession }}"}'>
                                <input type="text"
                                    value="{{ $team->langs->firstWhere('lang', app()->getLocale())->profession }}"
                                    class="form-control" id="exampleInputName1" name="profession"
                                    placeholder="Profession" />
                                @error('profession')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Experience</label>
                            <input type="text" class="form-control" name="experience"
                                value="{{ $team->experience }}" />
                            @error('experience')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Order</label>
                            <input type="number" class="form-control" name="order" value="{{$team->order}}" />
                            @error('order')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" multiple class="file-upload-default" name="image" />

                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image" />

                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button"> Upload
                                    </button>
                                </span>
                            </div>
                            @error('image')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                            <div class="upload-box">
                                @if ($team->image != null)
                                    <img src="{{ asset('uploads/teams/' . $team->image) }}" width="200" alt="">
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Save </button>
                        <a href="{{ route('teams') }}" class="btn btn-light">Go Back</a>
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
    <script src="{{ asset('manage/js/file-upload.js') }}"></script>
    <script>
        let fileInputs = document.querySelectorAll('.file-upload-default');
        let removes = document.querySelectorAll('.image-box .mdi-close');

        for (let fileInput of fileInputs) {
            fileInput.addEventListener('change', function(e) {
                let boxContainer = this.nextElementSibling.nextElementSibling;
                let files = e.target.files;
                if (fileInput.getAttribute('multiple') == null) {
                    boxContainer.innerHTML = "";
                }
                for (let file of files) {
                    let reader = new FileReader();
                    reader.addEventListener('loadend', function(e) {
                        let src = e.target.result;
                        let box = document.createElement('div');
                        let remove = document.createElement('i');
                        let input = document.createElement('input');
                        input.setAttribute('hidden', '');
                        input.setAttribute('multiple', '');
                        input.setAttribute('name', 'images[]');
                        input.setAttribute('value', file.name);
                        remove.classList.add('mdi', 'mdi-close');

                        box.classList.add('image-box');

                        let img = document.createElement('img');
                        img.setAttribute('src', src);
                        img.setAttribute('width', 150);
                        box.append(img, input);
                        box.append(remove);
                        boxContainer.append(box);

                        let removes = document.querySelectorAll('.image-box .mdi-close');

                        removes.forEach((remove, index) => {
                            remove.addEventListener('click', function() {
                                remove.parentElement.remove();
                            });
                        })

                    })

                    reader.readAsDataURL(file);
                }
            })
        }

        removes.forEach((remove, index) => {
            remove.addEventListener('click', function() {
                remove.parentElement.parentElement.remove();
            });
        })
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
            let name_lang = JSON.parse($('[name="fullname_lang"]').val());
            let profession_lang = JSON.parse($('[name="profession_lang"]').val());
            $('.lang').find('a').removeClass('active');
            $(this).addClass('active');
            let lang = $(this).attr('href');
            $('#lang').val(lang);
            $('[name="fullname"]').val(name_lang[lang]);
            $('[name="profession"]').val(profession_lang[lang]);
        })
    </script>
@endsection
