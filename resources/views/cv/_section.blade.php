<div class="cv-section">
    <h5 class="text-secondary">{{ $title }}</h5>
    @if(isset($content))
        @if(isset($list) && $list === true)
            <ul>
                @foreach($content as $item)
                    <li>{!! $item !!}</li>
                @endforeach
            </ul>
        @else
            @foreach($content as $item)
                {!! $item !!}
                <br>
            @endforeach
        @endif
    @elseif(isset($include))
        @include($include)
    @endif
</div>