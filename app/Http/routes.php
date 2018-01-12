<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/cv', ['as' => 'cv', 'uses' => 'CVController@index']);
Route::get('/blog', ['as' => 'blog', 'uses' => 'BlogController@index']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@index']);
