@extends('layouts.app')

@section('content')
    <div class="container welcome">
        <div class="row">
            <div class="col col-md-4 p-0 about-me">
                <a href="{{ route('about-me') }}">
                    <span>About Me</span>
                </a>
            </div>
            <div class="col col-md-4 p-0 cv">
                <a href="{{ route('cv') }}">
                    <span>Curriculum Vitae</span>
                </a>
            </div>
            <div class="col col-md-4 p-0 resources">
                <a href="{{ route('resources') }}">
                    <span>Resources</span>
                </a>
            </div>
        </div>
        @if($articles->count() > 0)
            @foreach ($articles->chunk(3) as $chunk)
                <div class="row">
                    @foreach ($chunk as $article)
                        <div class="col col-md-4 p-0" style="background-image: url({{ $article->getPublicImage() }})">
                            <a href="{{ route('articles.show', ['id' => $article->id]) }}">
                                <span>{{ $article->title }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
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
