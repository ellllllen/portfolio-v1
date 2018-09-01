<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\PersonalWebsite\Activities\GetActivities;
use Ellllllen\PersonalWebsite\Articles\GetArticles;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param GetArticles $getArticles
     * @param GetActivities $getActivities
     * @return \Illuminate\Http\Response
     */
    public function index(GetArticles $getArticles, GetActivities $getActivities)
    {
        return view('welcome')->with('articles', $getArticles->getWithImages(5))
            ->with('activities', $getActivities->get(5));
    }
}
