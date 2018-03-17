<div class="badge">
    @if($url)
        <a target="_blank" href="{{ $url }}">
            <img src="{{ $badgeImage }}"/>
        </a>
    @else
        <img src="{{ $badgeImage }}"/>
    @endif
</div>