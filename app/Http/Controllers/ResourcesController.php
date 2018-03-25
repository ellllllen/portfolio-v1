<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\PersonalWebsite\Resources\GetResources;

class ResourcesController extends Controller
{
    public function index(GetResources $getResources)
    {
        return view('resources')->with('resources', $getResources->get());
    }
}