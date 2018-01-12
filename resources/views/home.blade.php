@extends('partials/main', ['mainTitle' => 'About Me'])

@section('content')
<div class="about-me">
    Hi, I'm Ellen and I currently live in Cirencester, Gloucestershire working as a full time Web Developer.
    I graduated from Bournemouth University in 2010, gaining a 2:1 BSc (Hons) in Computing.
    I specialise in PHP, MySQL, HTML, CSS and JavaScript and have experience in developing using MVC frameworks like
    Laravel.
    I have been employed as a full time Web Developer for over 5 years.
    <br><br>
    My hobbies include walking, arts and crafts, film and TV and socialising with friends and family. I have 2
    Hamsters
    called Scampi and Slippy who enjoy eating, sleeping and running on their wheels.
</div>
<div class="button-container">
    <a href="{{ route('cv') }}">View my full CV</a>
    <a href="{{ route('contact') }}">Contact Me</a>
</div>
@endsection