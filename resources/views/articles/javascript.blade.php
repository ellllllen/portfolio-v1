@extends('layouts.app', ['mainTitle' => ""])

@section('content')
    <canvas id="myCanvas"></canvas>
@endsection

@section('js')
    <script src="{{ asset('js/vendor/codecademy/alphabet.js') }}"></script>
    <script src="{{ asset('js/vendor/codecademy/bubbles.js') }}"></script>
    <script>
        $(document).ready(function () {
            var colours = [[211, 98, 63], [351, 93, 63], [351, 93, 63], [270, 93, 63], [211, 98, 63]];
            var myName = "Ellen";
            bubbleShape = "circle";

            drawName(myName, colours);
            bounceBubbles();
        });
    </script>
@endsection