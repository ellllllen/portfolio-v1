@extends('layouts.app')

@section('content')
    <div class="container welcome">
        <div class="row mb-4">
            <div class="col col-4 p-0 about-me">
                <a href="{{ route('about-me') }}">
                    <span>@lang('about_me.title')</span>
                </a>
            </div>
            <div class="col col-4 p-0 cv">
                <a href="{{ route('cv') }}">
                    <span>Curriculum Vitae</span>
                </a>
            </div>
            <div class="col col-4 p-0 resources">
                <a href="{{ route('resources') }}">
                    <span>Resources</span>
                </a>
            </div>
        </div>
    </div>
    @if($articles->count() > 0)
        <div class="container">
            <div class="row mb-4">
                <div class="col col-6 p-0">
                    <h3>Latest Articles</h3>
                    @foreach($articles as $article)
                        @include('articles._article', ['length' => 200])
                    @endforeach
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{ route('articles.index') }}">
                            View all my Articles
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            var image = $('.welcome a');
            image.on('mouseover', function () {
                $(this).find('span').show();
            });
            image.on('mouseout', function () {
                $(this).find('span').hide();
            });
        });
    </script>
@endsection
