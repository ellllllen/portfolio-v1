@extends('partials.main', ['mainTitle' => 'Resources'])

@section('content')
    @if($resources->count() > 0)
        <div class="resources-container">
            <div>
                I try to improve my knowledge and keep up to date with technologies whenever possible. These are a few
                examples I would recommend:
            </div>
            @foreach($resources as $resource)
                <div class="resource">
                    <h3>
                        <a href="{{ $resource->url }}" target="_blank">
                            {{ $resource->name }}
                        </a>
                    </h3>
                    <div>
                        {{ $resource->description }}
                    </div>
                    @if($resource->data)
                        @include($resource->getBladeTemplate());
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endsection