<?php namespace App\Http\Controllers;

class CVController extends Controller
{
    public function index()
    {
        return view('cv')->with('activeNav', 1);
    }
} 