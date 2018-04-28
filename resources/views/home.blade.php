@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('articles.report') }}">Article Report</a>
            </li>
        </ul>
    </div>
@endsection
