<?php namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact')->with('activeNav', 3);
    }
} 