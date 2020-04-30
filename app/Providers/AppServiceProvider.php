<?php

namespace Ellllllen\Providers;

use Ellllllen\Portfolio\Activities\Activities;
use Ellllllen\Portfolio\Activities\ActivitiesInterface;
use Ellllllen\Portfolio\Articles\Books\Books;
use Ellllllen\Portfolio\Articles\Books\BooksInterface;
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
     * @param UrlGenerator $url
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if(env('APP_ENV') !== 'local' && env('APP_ENV') !== 'testing') {
            $url->forceScheme('https');
        }

        $this->createNavigation();

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

        $this->app->bind(BooksInterface::class, Books::class);
        $this->app->bind(ActivitiesInterface::class, Activities::class);
    }

    private function createNavigation()
    {
        $navigation = collect([
            'welcome' => trans('home.title'),
            'about-me' => trans('about_me.title'),
            'cv' => trans('cv.title'),
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
}
