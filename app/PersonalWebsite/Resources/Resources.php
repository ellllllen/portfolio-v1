<?php

namespace Ellllllen\PersonalWebsite\Resources;

use Ellllllen\ApiWrapper\Connect;
use Illuminate\Support\Collection;

class Resources implements ResourcesInterface
{
    /**
     * @var Connect
     */
    private $connect;

    /**
     * GetResources constructor.
     * @param Connect $connect
     */
    public function __construct(Connect $connect)
    {
        $this->connect = $connect;
    }

    public function all(): Collection
    {
        return collect([
            new Resource('Laracasts', 'https://www.laracasts.com/', 'Laracasts allows me to learn visually and
                follow along with the lessons. It also offers more tutorials than Laravel and PHP.'),

            new Resource('Laravel News', 'https://laravel-news.com/', 'The official Laravel news source. This site
                contains a blog with the latest news, tutorials and packages from Laravel contributors.'),

            new Resource('Codecademy', 'https://www.codecademy.com', 'Where I can learn to code interactively, for
                free.'),

            new Resource('Udacity', 'https://udacity.com/',
                'This website offers loads of different programming courses. It\'s very professional and is
                used by lots of big companies.'),

            new Resource('Code School', 'https://codeschool.com/', 'Code School teaches web technologies in the
                comfort of your browser with video lessons, coding challenges, and screencasts. These are the badges I have earned so far:',
                json_decode($this->connect->doRequest())),
        ]);
    }
}