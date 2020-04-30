<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\Portfolio\Activities\GetActivities;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param GetActivities $getActivities
     * @return Application|Factory|View
     */
    public function index(GetActivities $getActivities)
    {
        return view('welcome')
            ->with('activities', $getActivities->get(5));
    }
}
