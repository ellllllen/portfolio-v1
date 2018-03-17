<h4>Courses</h4>
<div class="badges-container">
    @if($resource->data->courses)
        @foreach($resource->data->courses->completed + $resource->data->courses->in_progress as $course)
            @include('resources._badge', ['url' => $course->url, 'badgeImage' => $course->badge])
        @endforeach
    @endif
</div>
<h4>Badges</h4>
<div class="badges-container">
    @if($resource->data->badges)
        @foreach($resource->data->badges as $badge)
            @include('resources._badge', ['url' => $badge->course_url, 'badgeImage' => $badge->badge])
        @endforeach
    @endif
</div>