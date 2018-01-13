<nav>
    <ul>
        @foreach($navigation as $key => $nav)
            <li class="{{ $activeNav == $key ? 'active-menu' : ''}}">
                <a href="{{ route($nav['route']) }}">{{ $nav['title'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>