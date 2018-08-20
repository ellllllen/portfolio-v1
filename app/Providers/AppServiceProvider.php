<?php

namespace Ellllllen\Providers;

use Ellllllen\PersonalWebsite\Activities\Activities;
use Ellllllen\PersonalWebsite\Activities\ActivitiesInterface;
use Ellllllen\PersonalWebsite\Books\Books;
use Ellllllen\PersonalWebsite\Books\BooksInterface;
use Ellllllen\PersonalWebsite\Resources\Resources;
use Ellllllen\PersonalWebsite\Resources\ResourcesInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->createNavigation();
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
