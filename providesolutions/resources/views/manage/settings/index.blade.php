@extends('manage.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            @if (Session::has('success_message'))
                <input type="hidden" id="success" value="{!! Session('success_message') !!}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Settings</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Header Logo </label>
                            <input type="file" class="file-upload-default" name="header_logo" />

                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image" />

                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                                </span>
                            </div>
                            @error('header_logo')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                            <div class="upload-box">
                                @if ($setting != null)
                                    <div class="image-box">
                                        <img src="{{ asset('uploads/' . $setting->header_logo) }}" width="200" alt="">
                                        <i class="mdi mdi-close"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Footer Logo </label>
                            <input type="file" class="file-upload-default" name="footer_logo" />

                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image" />

                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                                </span>
                            </div>
                            @error('footer_logo')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                            <div class="upload-box">
                                @if ($setting != null)
                                    <div class="image-box">
                                        <img src="{{ asset('uploads/' . $setting->footer_logo) }}" width="200" alt="">
                                        <i class="mdi mdi-close"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="email"
                                placeholder="Email" value="{{ $setting != null ? $setting->email : '' }}" />
                            @error('email')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($setting)
                            @foreach ($setting->phones as $key=>$phone)
                                <div class="form-group">
                                    <label for="exampleInputName1" class="d-block">Phones</label>
                                    <input type="text" class="form-control {{ $key!=0 ? 'd-inline-block' : '' }}" style="{{ $key != 0 ? 'margin-right:20px; width:80%' : '' }}" id="exampleInputName1" name="phones[]"
                                        placeholder="Phone" value="{{ $phone }}" />
                                        @if($key != 0) <div class="remove btn btn-danger"><i class="mdi mdi-delete"></i></div> @endif
                                    @error('phones[]')
                                        <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                        @else
                            <div class="form-group">
                                <label for="exampleInputName1">Phones</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="phones[]"
                                    placeholder="Phone" value="" />
                                @error('phones')
                                    <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <div class="d-flex flex-wrap align-items-center my-2" id="add-phone">
                            <label for="">Add Phone</label>
                            <div class="btn btn-success add-phone ml-3">
                                <i class="mdi mdi-plus"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
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

        #add-phone .form-group {
            width: 100%;
        }

        #add-phone .form-group input {
            display: inline-block;
            width: 80%;
            margin-right: 20px;
        }

    </style>
@endsection
@section('file-upload')
    <script src="{{ asset('manage/js/file-upload.js') }}"></script>
    <script>
        let fileInputs = document.querySelectorAll('.file-upload-default');
        let removes = document.querySelectorAll('.image-box .mdi-close');

        for (let fileInput of fileInputs) {
            fileInput.addEventListener('change', function(e) {
                let boxContainer = this.nextElementSibling.nextElementSibling;
                console.log(boxContainer);
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
                remove.parentElement.remove();
            });
        })
    </script>
    <script>
        let add_phone = document.querySelector('.add-phone');
        let removeBtns = document.querySelectorAll('.remove');
        removeBtns.forEach(remove=>{
            console.log(remove);
            remove.addEventListener('click',function(e){
                e.preventDefault();
                remove.parentElement.remove();
            });
        })
        add_phone.addEventListener('click', function() {
            let group = document.createElement('div');
            group.classList.add('form-group', 'my-3');
            let label = document.createElement('label');
            let input = document.createElement('input');
            input.classList.add('form-control');
            input.setAttribute('name', 'phones[]');
            let remove = document.createElement('button');
            remove.classList.add('btn', 'btn-danger');
            let removeIcon = document.createElement('i');
            removeIcon.classList.add('mdi', 'mdi-delete');
            remove.append(removeIcon);
            group.append(label, input, remove);
            document.querySelector('#add-phone').append(group);
            remove.addEventListener('click', function(e) {
                e.preventDefault();
                remove.parentElement.remove();
            })
        })
    </script>
@endsection
