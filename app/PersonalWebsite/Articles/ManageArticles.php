<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Support\Facades\Auth;

class ManageArticles
{
    public function store(array $fields)
    {
        $path = $fields['image']->store('public/images');

        $article = new Article();
        $article->title = $fields['title'];
        $article->section = $fields['section'];
        $article->image = str_replace('public/images/', '', $path);
        $article->view = $fields['view'] ?? null;
        $article->created_by = Auth::id();
        $article->save();
    }
}