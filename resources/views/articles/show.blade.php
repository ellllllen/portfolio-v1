@extends('layouts.app', ['mainTitle' => $article->title])

@section('content')
    {!! $article->section !!}
@endsection