@extends('manage.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">{{ $apply->name. ' '. $apply->lastname }}</h5>
                  <p class="card-text">Telefon : {{ $apply->phone }}</p>
                  <p class="card-text">Email : {{ $apply->email }}</p>
                  <p class="card-text">Cins : {{ $apply->gender }}</p>
                  <p class="card-text">Təcrübə : {{ $apply->experience }}</p>
                  <p class="card-text">Doğum tarixi : {{ $apply->birthday }}</p>
                  <p class="card-text">Vakansiya : {{ $apply->vacancy->langs->firstWhere('lang',app()->getLocale())->title }}</p>
                  <p class="card-text">CV : <a target="_blank" href="/uploads/docs/{{ $apply->cv }}">{{ $apply->cv }}</a></p>
                  <a  href="{{ route('applies') }}" class="btn btn-primary">Go Back</a>
                </div>
              </div>
        </div>
    </div>
@endsection