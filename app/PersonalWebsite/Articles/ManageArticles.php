<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ManageArticles
{
    public function store(array $fields)
    {
        $imageType = pathinfo($fields['image'], PATHINFO_EXTENSION);
        $image = file_get_contents($fields['image']);

        $article = new Article();
        $article->title = $fields['title'];
        $article->section = $fields['section'];
        $article->image = 'data:image/' . $imageType . ';base64,' . base64_encode($image);
        $article->created_by = Auth::id();
        $article->save();
    }

    public function destroy(Article $article)
    {
        $article->delete();
    }

    public function update(array $fields, Article $article)
    {
        if (isset($fields['image'])) {
            $imageType = pathinfo($fields['image'], PATHINFO_EXTENSION);
            $image = file_get_contents($fields['image']);
            $article->image = 'data:image/' . $imageType . ';base64,' . base64_encode($image);
        }

        $article->title = $fields['title'];
        $article->section = $fields['section'];
        $article->save();
    }
}
