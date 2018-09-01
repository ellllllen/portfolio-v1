@extends('layouts.app', ['mainTitle' => trans('cv.title')])

@section('content')

    @include('cv._section', ['title' => trans('cv.content.personal-statement.title'), 'content' => trans('cv.content.personal-statement.content')])
    @include('cv._section', ['title' => trans('cv.content.specialist-skills.title'), 'content' => trans('cv.content.specialist-skills.content'), 'list' => true])
    @include('cv._section', ['title' => trans('cv.content.employment.title'), 'include' => 'cv._employment'])
    @include('cv._section', ['title' => trans('cv.content.education.title'), 'include' => 'cv._education'])
    @include('cv._section', ['title' => trans('cv.content.references.title'), 'content' => trans('cv.content.references.content')])

@endsection