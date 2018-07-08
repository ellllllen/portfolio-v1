<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\PersonalWebsite\Articles\GetArticles;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param GetArticles $getArticles
     * @return \Illuminate\Http\Response
     */
    public function index(GetArticles $getArticles)
    {
        return view('welcome')->with('articles', $getArticles->get(5));
    }
}
