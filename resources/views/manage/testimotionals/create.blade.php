@extends('manage.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-10 offset-1 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Müştəri fikirləri</h4>
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
                                <label for="exampleInputName1">Name</label>
                                <input type="hidden" name="name_lang" value='{"az":"","ru":"","en":""}'>
                                <input type="text" class="form-control" id="exampleInputName1" name="name"
                                    placeholder="name" />
                                @error('name')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Profession</label>
                                <input type="hidden" name="profession_lang" value='{"az":"","ru":"","en":""}'>
                                <input type="text" class="form-control" id="exampleInputName1" name="profession"
                                    placeholder="profession" />
                                @error('profession')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Text</label>
                                <input type="hidden" name="text_lang" value='{"az":"","ru":"","en":""}'>
                                <textarea name="text" class="form-control" rows="5"></textarea>
                                @error('text')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="file-upload-default" name="image"/>

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
                            <div class="upload-box"></div>
                        </div>
                        <div class="form-group">
                            <label>Company Icon</label>
                            <input type="file" class="file-upload-default" name="company_icon"/>

                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image" />

                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button"> Upload
                                    </button>
                                </span>
                            </div>
                            @error('company_icon')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                            <div class="upload-box"></div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Save </button>
                        <a href="{{ route('imotionals') }}" class="btn btn-light">Go Back</a>
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
            let name_lang = JSON.parse($('[name="name_lang"]').val());
            let profession_lang = JSON.parse($('[name="profession_lang"]').val());
            let text_lang = JSON.parse($('[name="text_lang"]').val());
            $('.lang').find('a').removeClass('active');
            $(this).addClass('active');
            let lang = $(this).attr('href');
            $('#lang').val(lang);
            $('[name="name"]').val(name_lang[lang]);
            $('[name="profession"]').val(profession_lang[lang]);
            $('[name="text"]').val(text_lang[lang]);
        })
    </script>
@endsection
