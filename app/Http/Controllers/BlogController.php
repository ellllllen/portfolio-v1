<?php namespace Ellllllen\Http\Controllers;


class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('blog');
    }
} 