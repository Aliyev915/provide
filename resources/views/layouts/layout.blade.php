@php
    $setting = \App\Models\Setting::all()->first();
    $services = \App\Models\Service::all()->sortByDesc('created_at');
    $lang = app()->getLocale();
@endphp
<!DOCTYPE html>
<html lang={{ app()->getLocale() }}>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/1.png')}}">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Select -->
    <link rel="stylesheet" href="{{ asset('assets/select/nice-select.css')}}" />
    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('assets/aos/aos.css')}}" />
    @toastr_css  
    <title>Provide Solutions</title>
</head>

<body>
    {{-- <div>
        <div class="loader">
            <img src="{{ asset('assets/images/loader.gif')}}" />
        </div>
    </div> --}}

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/select/jquery.js')}}"></script>
    <script src="{{ asset('assets/select/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('assets/aos/aos.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    @toastr_js
    @toastr_render
</body>

</html>
