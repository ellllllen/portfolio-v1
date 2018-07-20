<?php

namespace Ellllllen\Providers;

use Ellllllen\PersonalWebsite\Activities\Activities;
use Ellllllen\PersonalWebsite\Activities\ActivitiesInterface;
use Ellllllen\PersonalWebsite\Books\Books;
use Ellllllen\PersonalWebsite\Books\BooksInterface;
use Ellllllen\PersonalWebsite\Resources\Resources;
use Ellllllen\PersonalWebsite\Resources\ResourcesInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

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
        $this->composerActiveNavigation($navigation);
    }

    private function composerNavigation(Collection $navigation)
    {
        view()->composer('*', function ($view) use ($navigation) {
            $view->with('navigation', $navigation);
        });
    }

    private function composerActiveNavigation(Collection $navigation)
    {
        $navigation->each(function ($item, $key) {
            view()->composer($key, function ($view) use ($key) {
                $view->with('activeNav', $key);
            });
        });
    }
}
