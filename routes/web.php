<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/about-me', 'AboutMeController@index')->name('about-me');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/cv')->group(function () {
    Route::get('/', ['as' => 'cv', 'uses' => 'CVController@index']);
});

Route::prefix('/articles')->group(function () {
    Route::get('/', ['uses' => 'ArticleController@index', 'as' => 'articles.index']);
    Route::get('/{article}', ['uses' => 'ArticleController@show', 'as' => 'articles.show']);
});
