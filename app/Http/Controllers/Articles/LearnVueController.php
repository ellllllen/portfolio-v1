<?php

namespace Ellllllen\Http\Controllers\Articles;

use Ellllllen\PersonalWebsite\Articles\Article;
use Illuminate\View\View;

class LearnVueController extends ShowArticle
{
    public function show(Article $article): View
    {
        return view('articles.show.learn-vue', compact('article'));
    }
}