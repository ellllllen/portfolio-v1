<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
        @foreach($navigation as $route => $title)
            <li class="{{ isset($activeNav) && $activeNav == $route ? 'active' : ''}}">
                <a class="nav-link" href="{{ route($route) }}">{{ $title }}</a>
            </li>
        @endforeach
    </ul>
</div>