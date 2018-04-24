<?php
Breadcrumbs::register('welcome', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('welcome'));
});

Breadcrumbs::register('about-me', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push('About Me', route('about-me'));
});

Breadcrumbs::register('cv', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push('Curriculum Vitae', route('cv'));
});

Breadcrumbs::register('resources', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push('Resources', route('resources'));
});

Breadcrumbs::register('articles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('welcome');
    $breadcrumbs->push('Knowledge Base', route('articles.index'));
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