@extends('manage.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">{{ $apply->fullname }}</h5>
                  <p class="card-text">Email : {{ $apply->email }}</p>
                  <p class="card-text">Telefon : {{ $apply->phone }}</p>
                  <p class="card-text">Mesaj : {{ $apply->message }}</p>
                  <a  href="{{ route('applies') }}" class="btn btn-primary">Go Back</a>
                </div>
              </div>
        </div>
    </div>
@endsection