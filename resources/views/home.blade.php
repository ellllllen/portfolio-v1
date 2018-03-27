@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('articles.create') }}">Create an Article</a>
            </li>
        </ul>
    </div>
@endsection
