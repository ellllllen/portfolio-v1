<?php

namespace App\Providers;

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
        $navigation = collect([
            ['title' => 'About Me', 'route' => 'home'],
            ['title' => 'Curriculum Vitae', 'route' => 'cv'],
            ['title' => 'Knowledge Base', 'route' => 'blog']
        ]);

        view()->composer('*', function ($view) use ($navigation) {
            $view->with('navigation', $navigation);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
