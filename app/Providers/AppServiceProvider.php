<?php

namespace Ellllllen\Providers;

use Ellllllen\ChatBot\BotMan\InitiateBotman;
use Ellllllen\ChatBot\Contracts\InitiateChatbotInterface;
use Ellllllen\PersonalWebsite\Activities\Activities;
use Ellllllen\PersonalWebsite\Activities\ActivitiesInterface;
use Ellllllen\PersonalWebsite\Articles\Books\Books;
use Ellllllen\PersonalWebsite\Articles\Books\BooksInterface;
use Ellllllen\PersonalWebsite\Resources\Resources;
use Ellllllen\PersonalWebsite\Resources\ResourcesInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if(env('APP_ENV') !== 'local' && env('APP_ENV') !== 'testing') {
            $url->forceScheme('https');
        }

        $this->createNavigation();
        $this->defineUrl();

        /**
         * https://laravel-news.com/laravel-5-4-key-too-long-error
         */
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }

        $this->app->bind(ResourcesInterface::class, Resources::class);
        $this->app->bind(BooksInterface::class, Books::class);
        $this->app->bind(ActivitiesInterface::class, Activities::class);
        $this->app->bind(InitiateChatbotInterface::class, InitiateBotman::class);
    }

    private function createNavigation()
    {
        $navigation = collect([
            'welcome' => trans('home.title'),
            'about-me' => trans('about_me.title'),
            'cv' => trans('cv.title'),
            'resources' => trans('resources.title'),
            'articles.index' => trans('articles.index.title'),
        ]);

        $this->composerNavigation($navigation);
        $this->composerActiveNavigation();
    }

    /**
     * @param Collection $navigation
     */
    private function composerNavigation(Collection $navigation)
    {
        view()->composer('partials._navigation', function ($view) use ($navigation) {
            $view->with('navigation', $navigation);
        });
    }

    private function composerActiveNavigation()
    {
        view()->composer('partials._navigation', function ($view) {
            $view->with('activeNav', Route::currentRouteName());
        });
    }

    private function defineUrl()
    {
        view()->composer('layouts.app', function ($view) {
            $view->with('chatUrl', env('APP_URL') . '/botman');
        });
    }
}
