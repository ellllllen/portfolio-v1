@extends('layouts.app')

@section('content')
    <div class="container welcome">
        <div class="row">
            <div class="col p-0 about-me">
                <a href="{{ route('about-me') }}">
                    <span>About Me</span>
                </a>
            </div>
            <div class="col p-0 cv">
                <a href="{{ route('cv') }}">
                    <span>CV</span>
                </a>
            </div>
            <div class="col p-0 resources">
                <a href="{{ route('resources') }}">
                    <span>Resources</span>
                </a>
            </div>
        </div>
    </div>
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
