<!DOCTYPE html>
<html>
<head>
    <title>Ellen Merchant</title>
    <link href="css/app.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container" id="app">
    <section class="left">
        <div class="left-top">
            <div class="left-title">Ellen Merchant</div>
            <div class="left-desc">Qualified web developer with
                over<br>{{ \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::createFromDate("2010", "06")) }} years
                industry experience
            </div>
        </div>
    </section>
    <section class="right">
        @include('partials.navigation')
        <div class="content">
            <div class="main-title">{{ $mainTitle }}</div class="main-title">
            @yield('content')
        </div>
    </section>
</div>
<script src="js/app.js"></script>
@yield('js')
</body>
</html>
