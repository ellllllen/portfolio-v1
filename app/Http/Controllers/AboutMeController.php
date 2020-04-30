<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\Portfolio\Articles\Tags\Tag;
use Ellllllen\Portfolio\Articles\GetArticles;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class AboutMeController extends Controller
{
    /**
     * @param GetArticles $getArticles
     * @return Factory|View
     */
    public function index(GetArticles $getArticles)
    {
        $tag = Tag::findOrFail(Tag::ABOUT_ME);

        return view('about-me')->with('articles', $getArticles->paginate($tag));
    }
}