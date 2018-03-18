<h6 class="text-center">Badges</h6>
<div class="badges-container">
    @if($resource->data->badges)
        @foreach($resource->data->badges as $badge)
            @include('resources._badge', ['url' => $badge->course_url, 'badgeImage' => $badge->badge])
        @endforeach
    @endif
</div>