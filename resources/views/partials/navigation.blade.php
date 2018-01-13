<?php
$navArr[] = ['title' => 'About Me', 'route' => 'home'];
$navArr[] = ['title' => 'Curriculum Vitae', 'route' => 'cv'];
$navArr[] = ['title' => 'Knowledge Base', 'route' => 'blog'];
$navArr[] = ['title' => 'Contact Me', 'route' => 'contact'];
?>

<nav>
    <ul>
        @foreach($navArr as $key => $nav)
        @if($activeNav == $key)
        <li class="active-menu">
            <a href="{{ route($nav['route']) }}">{{ $nav['title'] }}</a>
        </li>
        @else
        <li>
            <a href="{{ route($nav['route']) }}">{{ $nav['title'] }}</a>
        </li>
        @endif
        @endforeach
    </ul>
</nav>