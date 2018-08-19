@foreach(trans('cv.content.education.content') as $education)

    <div class="cv-employ">
        <div class="cv-employ-title">
            {{ $education['name'] }} - {{ $education['location'] }}
        </div>
        @foreach($education['qualifications'] as $qualification)
            <div class="cv-employ-subtitle">
                {{ $qualification['name'] }}
            </div>
            @foreach($qualification['content'] as $item)
                {!! $item !!}<br>
            @endforeach
            <br>
        @endforeach
    </div>

@endforeach
