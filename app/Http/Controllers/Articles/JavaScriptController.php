<?php

namespace Ellllllen\Http\Controllers\Articles;

use Ellllllen\Portfolio\Articles\Article;
use Illuminate\View\View;

class JavaScriptController extends ShowArticle
{
    public function show(Article $article): View
    {
        return view('articles.show.javascript', compact('article'));
    }
}