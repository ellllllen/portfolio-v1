@extends('layouts.app')

@section('content')
    <div class="container welcome">
        <div class="row">
            <div class="col col-md-4 p-0 about-me">
                <a href="{{ route('about-me') }}">
                    <span>@lang('about_me.title')</span>
                </a>
            </div>
            <div class="col col-md-4 p-0 cv">
                <a href="{{ route('cv') }}">
                    <span>Curriculum Vitae</span>
                </a>
            </div>
            <div class="col col-md-4 p-0 resources">
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
