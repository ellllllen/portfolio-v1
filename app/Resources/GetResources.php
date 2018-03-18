<?php

namespace Ellllllen\Resources;

use Ellllllen\ApiWrapper\Connect;
use Illuminate\Pagination\LengthAwarePaginator;

class GetResources
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

    public function get()
    {
        return collect([
            Resource::create('Laracasts', 'https://www.laracasts.com/', 'Laracasts allows me to learn visually and
                follow along with the lessons. It also offers more tutorials than Laravel and PHP.'),

            Resource::create('Laravel News', 'https://laravel-news.com/', 'The official Laravel news source. This site
                contains a blog with the latest news, tutorials and packages from Laravel contributors.'),

            Resource::create('Codecademy', 'https://www.codecademy.com', 'Where I can learn to code interactively, for
                free.'),

            Resource::create('Code School', 'https://codeschool.com/', 'Code School teaches web technologies in the
                comfort of your browser with video lessons, coding challenges, and screencasts. These are the badges I have earned so far:',
                json_decode($this->connect->doRequest())),
        ]);
    }
}