<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('partials.favicon')
</head>
<body>
<div id="app" class="ellen-theme">
    <div class="row justify-content-md-center  container-fluid">
        <div class="col-sm-2 bg-black text-center text-white mh-100">
            <div class="py-4 px-2">
                <div class="lead">Ellen Merchant</div>
                <em>Qualified web developer with
                    over<br>{{ \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::createFromDate("2010", "06")) }} years
                    industry experience</em>
            </div>
        </div>
        <div class="col-sm-10 p-0">
            @include('partials.navigation')
            <main class="p-3 container-fluid">
                <h4 class="pink">{{ $mainTitle ?? '' }}</h4>
                @yield('content')
            </main>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
</body>
</html>
