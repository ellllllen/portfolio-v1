@foreach($navigation as $route => $title)
    <li class="{{ isset($activeNav) && $activeNav == $route ? 'active' : ''}}">
        <a  class="nav-link" href="{{ route($route) }}">{{ $title }}</a>
    </li>
@endforeach