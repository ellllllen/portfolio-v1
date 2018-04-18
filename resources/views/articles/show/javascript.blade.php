@extends('articles.show')

@section('additional-content')
    <canvas id="myCanvas"></canvas>
@append

@section('js')
    <script src="{{ asset('js/vendor/codecademy/alphabet.js') }}"></script>
    <script src="{{ asset('js/vendor/codecademy/bubbles.js') }}"></script>
    <script>
        $(document).ready(function () {
            var colours = [[211, 98, 63], [351, 93, 63]];
            var myName = "Ellen";
            bubbleShape = "circle";

            drawName(myName, colours);
            bounceBubbles();
        });
    </script>
@append