@extends('layouts.app')

@section('content')
    <div class="container welcome">
        <div class="row mb-4">
            <div class="col col-4 p-0 about-me">
                <a href="{{ route('about-me') }}">
                    <span>@lang('about_me.title')</span>
                </a>
            </div>
            <div class="col col-4 p-0 cv">
                <a href="{{ route('cv') }}">
                    <span>Curriculum Vitae</span>
                </a>
            </div>
            <div class="col col-4 p-0 resources">
                <a href="{{ route('resources') }}">
                    <span>Resources</span>
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="row mb-4">
            <div class="col">
                <h3>Latest Articles</h3>
                @if($articles->count() > 0)
                    @foreach($articles as $article)
                        @include('articles._article', ['length' => 200])
                    @endforeach
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{ route('articles.index') }}">
                            View all my Articles
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                @else
                    @lang('articles.no_results')
                @endif
            </div>
            <div class="col-4">
                @if($activities->count() > 0)
                    <h3>My Activities</h3>
                    @foreach($activities as $activity)
                        <div class="row mb-5">
                            <div class="col">
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
                                <div class="d-flex">
                                    <div class="calendar mr-2 align-self-start">
                                        <span class="day">{{ $activity->getStartDate()->format('d') }}</span>
                                        <span class="month">{{ $activity->getStartDate()->format('M') }}</span>
                                    </div>
                                    <p class="card-text text-justify">
                                        {!! $activity->getDescription() !!}
                                    </p>
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
