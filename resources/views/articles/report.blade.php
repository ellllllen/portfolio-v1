@extends('layouts.app', ['mainTitle' => 'Article Report'])

@section('content')
    <p>This chart shows the amount of clicks on articles per month.</p>
    <div class="text-center">
        <line-chart url="{{ route('articles.get-clicks') }}" x-label="Number of Clicks"
                    y-label="Date/Time"></line-chart>
    </div>
    @if($articleClicks->total() > 0)
        <table class="table table-bordered table-sm">
            <thead class="thead-dark">
            <tr>
                <th>Date/Time</th>
                <th>Article</th>
                <th>IP</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articleClicks as $articleClick)
                <tr>
                    <td>{{ $articleClick->created_at }} ({{ $articleClick->created_at->diffForHumans() }})</td>
                    <td>{{ $articleClick->article->title }}</td>
                    <td>{{ $articleClick->ip }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $articleClicks->links() }}
    @endif
@endsection