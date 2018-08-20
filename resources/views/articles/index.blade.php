@extends('layouts.app', ['mainTitle' => trans('articles.index.title')])

@section('content')
    @auth
        <div class="d-flex mb-3 justify-content-end">
            <a class="btn btn-success" href="{{ route('articles.create') }}">Create an Article</a>
        </div>
    @endauth
    @if($articles->total() > 0)
        <div class="articles">
            @foreach($articles as $article)
                @include('articles._article', ['haveReadMoreButton' => true])
            @endforeach
        </div>
        <div class="text-center">
            {{ $articles->links() }}
        </div>
    @else
        <div class="alert alert-light" role="alert">
            @lang('articles.no_results')
        </div>
    @endif
@endsection