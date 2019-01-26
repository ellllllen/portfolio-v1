@extends('layouts.app')

@section('content')
    <div class="container welcome">
        <div class="row justify-content-md-center mb-3">
            <div class="col col-4 p-0 about-me welcome-image">
                <a href="{{ route('about-me') }}">
                    <span>@lang('about_me.title')</span>
                </a>
            </div>
            <div class="col col-6 p-0 cv welcome-image">
                <a href="{{ route('cv') }}">
                    <span>Curriculum Vitae</span>
                </a>
            </div>
            <div class="col col-5 p-0 resources welcome-image">
                <a href="{{ route('resources') }}">
                    <span>Resources</span>
                </a>
            </div>
            <div class="col col-5 p-0 articles welcome-image">
                <a href="{{ route('articles.index') }}">
                    <span>Articles</span>
                </a>
            </div>
        </div>
        <div class="row mb-4 justify-content-md-center">
            <div class="col col-10 pb-3">
                @if($activities->count() > 0)
                    <h3 class="text-primary">My Activity Feed</h3>
                    <div class="mb-3">
                        These are my latest activities/randoms, I like to keep a track of what I'm doing/have done so I
                        can refer back to them.
                    </div>
                    @foreach($activities as $activity)
                        <div class="row mb-5">
                            <div class="col">
                                <div class="d-flex">
                                    <div class="calendar mr-3 align-self-start">
                                        <span class="day">{{ $activity->getStartDate()->format('d') }}</span>
                                        <span class="month">{{ $activity->getStartDate()->format('M') }}</span>
                                    </div>
                                    <div>
                                        <h4>
                                            @if($activity->hasTitleLink())
                                                <a class="text-secondary" href="{{ $activity->getTitleLink() }}"
                                                   target="_blank">
                                                    {{ $activity->getTitle() }}
                                                </a>
                                            @else
                                                <span class="text-secondary">
                                                    {{ $activity->getTitle() }}
                                                </span>
                                            @endif
                                        </h4>
                                        <p class="card-text text-justify">
                                            {!! $activity->getDescription() !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-right">
                        <a class="text-secondary" href="{{ route('about-me') }}">
                            Find out more about me
                            <i class="fas fa-arrow-circle-right pl-1"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            var image = $('.welcome a');
            image.on('mouseover', function () {
                $(this).find('span').show();
            });
            image.on('mouseout', function () {
                $(this).find('span').hide();
            });
        });
    </script>
@endsection
