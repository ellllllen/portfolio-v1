<div class="container text-center">
    @if($resource->getData()->badges)
        @foreach($resource->getData()->badges as $badge)
            @include('resources._badge', ['url' => $badge->course_url, 'badgeImage' => $badge->badge])
        @endforeach
    @endif
</div>