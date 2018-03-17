<?php

namespace App\Http\Controllers;

use App\Resources\GetResources;

class ResourcesController extends Controller
{
    public function index(GetResources $getResources)
    {
        return view('resources')->with('resources', $getResources->get());
    }
}