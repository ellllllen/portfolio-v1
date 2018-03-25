<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\PersonalWebsite\Articles\Articles;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Articles $articles
     * @return \Illuminate\Http\Response
     */
    public function index(Articles $articles)
    {
        return view('welcome')->with('articles', $articles->get());
    }
}
