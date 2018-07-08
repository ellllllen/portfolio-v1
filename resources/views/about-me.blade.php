@extends('layouts.app', ['mainTitle' => trans('about_me.title')])

@section('content')
    <div class="text-justify mb-3">
        Hi, I'm Ellen and I currently live in Cirencester, Gloucestershire working as a full time Developer.
        I graduated from Bournemouth University in 2010, gaining a 2:1 BSc (Hons) in Computing.
        I specialise in PHP, MySQL, HTML, CSS and JavaScript and have experience in developing using the
        <a href="https://laravel.com">Laravel</a> framework.
        I have been employed as a full time Developer for over
        {{ \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::createFromDate("2010", "06")) }} years.
        <br><br>
        My hobbies include walking, photography, film and TV, music and Harry Potter.
        <br><br>
        Here is my GitHub for your perusal:
        <a target="_blank" href="https://github.com/ellllllen">https://github.com/ellllllen</a>
    </div>
    @if($articles->count() > 0)
        <div>
            @foreach($articles as $article)
                @include('articles._article')
            @endforeach
        </div>
    @endif
    <div class="text-right">
        <a class="btn btn-primary" href="{{ route('cv') }}">View my full CV</a>
    </div>
@endsection