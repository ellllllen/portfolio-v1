@extends('layouts.app', ['mainTitle' => 'Article Report'])

@section('content')
    <div class="text-center">
        <line-chart url="{{ route('articles.get-clicks') }}" x-label="Number of Clicks" y-label="Date/Time" title="Number of Clicks on Articles"></line-chart>
    </div>
@endsection