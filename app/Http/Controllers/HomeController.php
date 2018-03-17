<?php namespace App\Http\Controllers;

use Ellllllen\ApiWrapper\Connect;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Connect $connect)
    {
        return view('home')->with('codeSchool', json_decode($connect->doRequest()));
    }
} 