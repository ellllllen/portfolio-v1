@extends('layouts.app', ['mainTitle' => trans('about_me.title')])

@section('content')
    <div class="text-justify">
        @lang('about-me.desc', [
            'developerTime' => \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::createFromDate("2010", "06"))
        ])
        <a target="_blank" href="{{ config('ellen.github_link') }}">https://github.com/ellllllen</a>
    </div>
    <div class="text-center mb-5">
        <a class="btn btn-primary" href="{{ route('cv') }}">View my full CV</a>
    </div>
    @if($articles->count() > 0)
        <div>
            <h4 class="text-primary">Articles About Me</h4>
            <p>So sometimes I like to write a bit about non-techy things that I like or have done, these articles
                appear here.</p>
            @foreach($articles as $article)
                @include('articles._article', ['haveReadMoreButton' => true])
            @endforeach
        </div>
    @endif
@endsection