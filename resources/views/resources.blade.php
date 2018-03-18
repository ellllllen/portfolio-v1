@extends('partials.main', ['mainTitle' => 'Resources'])

@section('content')
    @if($resources->count() > 0)
        <div class="resources-container">
            <div>
                I try to improve my knowledge and keep up to date with technologies whenever possible. These are a few
                examples I would recommend:<br><br>
            </div>
            @foreach($resources as $resource)
                <div class="resource">
                    <div class="subtitle">
                        <a href="{{ $resource->url }}" target="_blank">
                            {{ $resource->name }}
                        </a>
                    </div>
                    <div>
                        {{ $resource->description }}
                    </div>
                    @includeWhen($resource->data, $resource->getBladeTemplate())
                </div>
            @endforeach
        </div>
    @endif
@endsection