@extends('layouts.app', ['mainTitle' => 'Article Report'])

@section('content')
    <p>This chart shows the amount of clicks on articles per month.</p>
    <div class="text-center">
        <line-chart url="{{ route('articles.get-clicks') }}" x-label="Number of Clicks" y-label="Date/Time"></line-chart>
    </div>
@endsection