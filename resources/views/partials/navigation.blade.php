<nav>
    <ul>
        @foreach($navigation as $route => $title)
            <li class="{{ $activeNav && $activeNav == $route ? 'active-menu' : ''}}">
                <a href="{{ route($route) }}">{{ $title }}</a>
            </li>
        @endforeach
    </ul>
</nav>