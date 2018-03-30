<div class="container text-center">
    @if($resource->data->badges)
        @foreach($resource->data->badges as $badge)
            @include('resources._badge', ['url' => $badge->course_url, 'badgeImage' => $badge->badge])
        @endforeach
    @endif
</div>