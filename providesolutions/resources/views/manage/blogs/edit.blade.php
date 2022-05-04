@extends('manage.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-10 offset-1 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Xəbəri Redaktə Et</h4>
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
                                    value='{"az":"{{ $blog->langs->firstWhere('lang', 'az')->title }}","ru":"{{ $blog->langs->firstWhere('lang', 'ru')->title }}","en":"{{ $blog->langs->firstWhere('lang', 'en')->title }}"}'>
                                <input type="text" class="form-control" id="exampleInputName1" name="title"
                                    placeholder="Title"
                                    value="{{ $blog->langs->firstWhere('lang', app()->getLocale())->title }}" />
                                @error('title')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Content</label>
                                <input type="hidden" name="content_lang"
                                    value='{"az":"{{ $blog->langs->firstWhere('lang', 'az')->content }}","ru":"{{ $blog->langs->firstWhere('lang', 'ru')->content }}","en":"{{ $blog->langs->firstWhere('lang', 'en')->content }}"}'>
                                <input type="text" class="form-control" id="exampleInputName1" name="content"
                                    placeholder="Content"
                                    value="{{ $blog->langs->firstWhere('lang', app()->getLocale())->content }}" />
                                @error('content')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description AZ</label>
                                <textarea name="description_az" id="editor"
                                    rows="20">{{ $blog->langs->firstWhere('lang', 'az')->description }}</textarea>
                                @error('description_az')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Description EN</label>
                                <textarea name="description_en" id="editor1"
                                    rows="20">{{ $blog->langs->firstWhere('lang', 'en')->description }}</textarea>
                                @error('description_en')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName1">Description RU</label>
                                <textarea name="description_ru" id="editor2"
                                    rows="20">{{ $blog->langs->firstWhere('lang', 'ru')->description }}</textarea>
                                @error('description_ru')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Time</label>
                            <input type="date" class="form-control" name="datetime"
                                value="{{ \Carbon\Carbon::parse($blog->datetime)->format('Y-m-d') }}" />
                            @error('datetime')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" class="file-upload-default" multiple name="images[]" />

                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image" />

                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button"> Upload
                                    </button>
                                </span>
                            </div>
                            @error('images.*')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                            <div class="upload-box">
                                @foreach ($blog->images as $image)
                                    <div class="image-box">
                                        <img src="{{ asset('uploads/blogs/' . $image->image) }}" width="200" alt="">
                                        <i class="mdi mdi-close"></i>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Save </button>
                        <a href="{{ route('blogs') }}" class="btn btn-light">Go Back</a>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
    </script>
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
            let title_lang = JSON.parse($('[name="title_lang"]').val());
            let content_lang = JSON.parse($('[name="content_lang"]').val());

            $('.lang').find('a').removeClass('active');
            $(this).addClass('active');
            let lang = $(this).attr('href');
            $('#lang').val(lang);
            $('[name="title"]').val(title_lang[lang]);
            $('[name="content"]').val(content_lang[lang]);
        })
    </script>
@endsection
