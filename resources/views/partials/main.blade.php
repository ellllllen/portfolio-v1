<!DOCTYPE html>
<html>
<head>
    <title>Ellen Merchant</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">
    <link href="css/ellen.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <section class="left">
        <div class="left-top">
            <div class="left-title">Ellen Merchant</div>
            <div class="left-desc">Qualified web developer with over<br>7 years industry experience</div>
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
