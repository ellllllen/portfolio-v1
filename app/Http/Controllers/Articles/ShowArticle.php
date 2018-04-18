<?php

namespace Ellllllen\Http\Controllers\Articles;

use Ellllllen\Http\Controllers\Controller;
use Ellllllen\PersonalWebsite\Articles\Article;
use Illuminate\View\View;

abstract class ShowArticle extends Controller
{
    abstract public function show(Article $article): View;
}