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
                    Sorry, I haven't posted any articles yet
                @endif
            </div>
            <div class="col-4">
                <h3>My Activities</h3>
                @if($activities->count() > 0)
                    @foreach($activities as $activity)
                        <div class="row mb-5">
                            <div class="col">
                                <h4 class="text-secondary">
                                    {{ $activity->getTitle() }}
                                </h4>
                                <p class="card-text text-justify">
                                    <i>{{ $activity->getStartDate()->format('Y-m-d') }}</i> -
                                    {!! $activity->getDescription() !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{ route('about-me') }}">
                            Find out more about me
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                @else
                    Sorry, I haven't posted any articles yet
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
