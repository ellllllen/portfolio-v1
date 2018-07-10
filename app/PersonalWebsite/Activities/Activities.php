<?php

namespace Ellllllen\PersonalWebsite\Activities;

use Carbon\Carbon;

class Activities
{
    private $activities;

    public function __construct()
    {
        $this->getActivities();
    }

    public function get(int $limit = 5)
    {
        return collect($this->activities)->take($limit);
    }

    /**
     * @return mixed
     */
    private function getActivities()
    {
        $this->activities = [
            new Activity('Scalable Microservices with Kubernetes by Google', 'Free Udacity Course,
                learning to containerise applications with Docker and Kubernetes.',
                Carbon::createFromDate(2018, 07, 10)),
            new Activity('Chatbot', 'Started following a tutorial on how to build a chatbot in PHP
                using Laravel and Botman. Check out my Github to follow my progress.',
                Carbon::createFromDate(2018, 07, 06)),
        ];

        return $this->activities;
    }


}