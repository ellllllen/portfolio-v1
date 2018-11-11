@extends('layouts.app', ['mainTitle' => trans('about_me.title')])

@section('content')
    <div class="text-justify mb-5">
        @lang('about_me.desc', [
            'developerTime' => \Carbon\Carbon::now()->diffInYears(config('ellen.developerTime'))
        ])
        <a target="_blank" href="{{ config('ellen.github_link') }}">https://github.com/ellllllen</a>
    </div>
    @if($articles->count() > 0)
        <div class="articles">
            <h3 class="text-primary">Articles About Me</h3>
            <p>So sometimes I like to write a bit about non-techy things that I like or have done, these articles
                appear here.</p>
            @foreach($articles as $article)
                @include('articles._article')
            @endforeach
        </div>
    @endif
@endsection