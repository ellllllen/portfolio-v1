<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\PersonalWebsite\Articles\Tags\Tag;
use Ellllllen\PersonalWebsite\Articles\GetArticles;

class AboutMeController extends Controller
{    
    public function index(GetArticles $getArticles)
    {
        $tag = Tag::findOrFail(Tag::ABOUT_ME);
        
        return view('about-me')->with('articles', $getArticles->paginate($tag));
    }
}