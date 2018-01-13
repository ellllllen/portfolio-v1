<!DOCTYPE html>
<html>
<head>
    <title>Ellen Merchant</title>
    <link href="css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <section class="left">
        <div class="left-top">
            <div class="left-title">Ellen Merchant</div>
            <div class="left-desc">Qualified web developer with over<br>{{ \Carbon\Carbon::now('Y')->diffInYears(\Carbon\Carbon::createFromDate("2010", "06")) }} years industry experience</div>
        </div>
    </section>
    <section class="right">
        @include('partials.navigation')
        <div class="content">
            <div class="main-title">{{ $mainTitle }}</div>
            @yield('content')
        </div>
    </section>
</div>
</body>
</html>
