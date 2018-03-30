@extends('layouts.app', ['mainTitle' => 'Knowledge Base'])

@section('content')
    @auth
        <a class="btn btn-success mb-2" href="{{ route('articles.create') }}">Create an Article</a>
    @endauth
    @if($articles->total() > 0)
        <div class="articles">
            @foreach($articles as $article)
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-6">
                            <img src="{{ $article->getPublicImage() }}" class="rounded img-thumbnail img-fluid"
                                 alt="{{ $article->title }}">
                            {{ $article->title }}
                        </h1>
                        <p>{!! $article->presentShortenedSection() !!}</p>
                        <p class="lead text-right">
                            <a class="btn btn-primary"
                               href="{{ route('articles.show', ['article' => $article->id]) }}"
                               role="button">
                                More Details
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            {{ $articles->links() }}
        </div>
    @endif
@endsection