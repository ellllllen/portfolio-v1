@extends('layouts.app', ['mainTitle' => 'Resources'])

@section('content')
    @if($resources->count() > 0)
        <div class="resources">
            <div class="mb-3">
                I try to improve my knowledge and keep up to date with the latest technologies whenever possible. These are a few
                    examples I would recommend:
            </div>
            @foreach($resources as $resource)
                <div class="mb-2">
                    <h5>
                        <a href="{{ $resource->getUrl() }}" target="_blank">
                            {{ $resource->getName() }}
                        </a>
                    </h5>
                    <div class="mb-3">
                        {{ $resource->getDescription() }}
                    </div>
                    @includeWhen($resource->getData(), $resource->getBladeTemplate())
                </div>
            @endforeach
        </div>
    @endif
@endsection