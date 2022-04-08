@extends('manage.layouts.layout')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            @if (Session::has('success_message'))
                <input type="hidden" id="success" value="{!! Session('success_message') !!}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sosials</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Facebook</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="facebook"
                                placeholder="Facebook" value="{{ $sosial != null ? $sosial->facebook : '' }}" />
                            @error('facebook')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Instagram</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="instagram"
                                placeholder="Instagram" value="{{ $sosial != null ? $sosial->instagram : '' }}" />
                            @error('instagram')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Linkedin</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="linkedin"
                                placeholder="Linkedin" value="{{ $sosial != null ? $sosial->linkedin : '' }}" />
                            @error('linkedin')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Telegram</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="telegram"
                                placeholder="Telegram" value="{{ $sosial != null ? $sosial->telegram : '' }}" />
                            @error('telegram')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Youtube</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="youtube"
                                placeholder="Youtube" value="{{ $sosial != null ? $sosial->youtube : '' }}" />
                            @error('youtube')
                                <span class="text-danger mt-2 d-inline-block">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
