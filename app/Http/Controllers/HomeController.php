<?php namespace App\Http\Controllers;

use App\Resources\GetResources;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(GetResources $getResources)
    {
        return view('home')->with('resources', $getResources->get());
    }
} 