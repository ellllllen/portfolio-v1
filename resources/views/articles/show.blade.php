@extends('layouts.app', ['mainTitle' => $article->title])

@section('content')
    @auth
        <div class="d-flex mb-3 justify-content-end">
            <a href="{{ route('articles.edit', ['id' => $article->id]) }}"
               class="btn btn-warning mr-2">Edit</a>
            <form action="{{ route('articles.destroy', ['id' => $article->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete"
                       onclick="return confirm('Delete?');"/>
            </form>
        </div>
    @endauth
    <div>
        <div class="mb-3">
            <i>Created: {{ $article->created_at->format('Y-m-d') }} ({{ $article->created_at->diffForHumans() }})</i>
            <br>
            <i>Last Updated: {{ $article->updated_at->format('Y-m-d') }} ({{ $article->updated_at->diffForHumans() }}
                )</i>
        </div>
        {!! $article->section !!}
    </div>

    @yield('additional-content')
@endsection