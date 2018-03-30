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
                    <h4>
                        <a href="{{ $resource->url }}" target="_blank">
                            {{ $resource->name }}
                        </a>
                    </h4>
                    <div class="mb-3">
                        {{ $resource->description }}
                    </div>
                    @includeWhen($resource->data, $resource->getBladeTemplate())
                </div>
            @endforeach
        </div>
    @endif
@endsection