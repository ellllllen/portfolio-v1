@extends('layouts.app', ['mainTitle' => 'Knowledge Base'])

@section('content')
    @auth
        <div class="d-flex mb-3 justify-content-end">
            <a class="btn btn-success" href="{{ route('articles.create') }}">Create an Article</a>
        </div>
    @endauth
    @if($articles->total() > 0)
        <div class="articles">
            @foreach($articles as $article)
                <div class="jumbotron jumbotron-fluid py-3 rounded">
                    <div class="container">
                        <h1 class="display-6">
                            <img src="{{ $article->getPublicImage() }}" class="rounded img-thumbnail img-fluid"
                                 alt="{{ $article->title }}">
                            {{ $article->title }}
                        </h1>
                        <p>{!! $article->present()->shortenedSection() !!}</p>
                        <div class="text-right">
                            <a class="btn btn-primary"
                               href="{{ route('articles.show', ['article' => $article->id]) }}"
                               role="button">
                                More Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            {{ $articles->links() }}
        </div>
    @endif
@endsection