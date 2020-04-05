<?php

namespace Ellllllen\PersonalWebsite\Resources;

use Illuminate\Support\Collection;

class Resources implements ResourcesInterface
{
    public function all(): Collection
    {
        return collect([
            new Resource('Laracasts', 'https://laracasts.com/', 'Laracasts allows me to learn visually and
                follow along with the lessons. It also offers more tutorials than Laravel and PHP.'),

            new Resource('Laravel News', 'https://laravel-news.com/', 'The official Laravel news source. This site
                contains a blog with the latest news, tutorials and packages from Laravel contributors.'),

            new Resource('Codecademy', 'https://www.codecademy.com/', 'Where I can learn to code interactively, for
                free.'),

            new Resource('Udacity', 'https://www.udacity.com/',
                'This website offers loads of different programming courses. It\'s very professional and is
                used by lots of big companies.'),

            new Resource('Udemy', 'https://www.udemy.com/', 'Online courses taught by expert instructors.'),
        ]);
    }
}