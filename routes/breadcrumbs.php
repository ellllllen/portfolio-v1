<?php
Breadcrumbs::register('welcome', function ($breadcrumbs) {
    $breadcrumbs->push(trans('home.title'), route('welcome'));
});

Breadcrumbs::register('about-me', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push(trans('about_me.title'), route('about-me'));
});

Breadcrumbs::register('cv', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push(trans('cv.title'), route('cv'));
});

Breadcrumbs::register('resources', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push(trans('resources.title'), route('resources'));
});

Breadcrumbs::register('articles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push(trans('articles.index.title'), route('articles.index'));
});

Breadcrumbs::register('articles.show', function ($breadcrumbs, $articleID) {
    $getArticles = app(\Ellllllen\PersonalWebsite\Articles\GetArticles::class);
    $article = $getArticles->findOrFail($articleID);
    $breadcrumbs->parent('articles.index');
    $breadcrumbs->push($article->title, route('articles.show', ['article' => $articleID]));
});

Breadcrumbs::register('login', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push('Login', route('login'));
});