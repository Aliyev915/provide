@extends('manage.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">{{ $message->fullname }}</h5>
                  <p class="card-text">Telefon : {{ $message->phone }}</p>
                  <p class="card-text">Email : {{ $message->email }}</p>
                  <p class="card-text">Mesaj : {{ $message->text }}</p>
                  <a  href="{{ route('messages') }}" class="btn btn-primary">Go Back</a>
                </div>
              </div>
        </div>
    </div>
@endsection