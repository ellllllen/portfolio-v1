@foreach(trans('cv.content.employment.content') as $employment)

    <div class="cv-employ">
        <div class="cv-employ-title">
            {{ $employment['name'] }} - {{ $employment['location'] }}
        </div>
        @foreach($employment['roles'] as $role)
            <div class="cv-employ-subtitle">
                {{ $role['title'] }} ({{ $role['date'] }})
            </div>
        @endforeach
        @foreach($employment['content'] as $item)
            {!! $item !!}<br>
        @endforeach
    </div>

@endforeach