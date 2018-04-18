<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ManageArticles
{
    public function store(array $fields)
    {
        $path = $fields['image']->store('public/images');

        $article = new Article();
        $article->title = $fields['title'];
        $article->section = $fields['section'];
        $article->image = str_replace('public/images/', '', $path);
        $article->created_by = Auth::id();
        $article->save();
    }

    public function destroy(Article $article)
    {
        try {
            $article->delete();
        } catch (\Exception $e) {
            Log::error('Article not deleted');
        }
    }

    public function update(array $fields, Article $article)
    {
        if (isset($fields['image'])) {
            $path = $fields['image']->store('public/images');
            $article->image = str_replace('public/images/', '', $path);
        }

        $article->title = $fields['title'];
        $article->section = $fields['section'];
        $article->save();
    }
}