@extends('layouts.app', ['mainTitle' => 'Knowledge Base'])

@section('content')
    @if($articles->total() > 0)
        <div class="articles">
            @foreach($articles as $article)
                <div class="article">
                    <h6>
                        <a href="{{ route('articles.show', ['article' => $article->id]) }}">
                            {{ $article->title }}
                        </a>
                    </h6>
                    <div class="pb-3">
                        {!! $article->section !!}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection