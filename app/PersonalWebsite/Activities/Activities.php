<?php

namespace Ellllllen\PersonalWebsite\Activities;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class Activities
{
    private $activities;

    public function __construct()
    {
        $this->getActivities();
    }

    /**
     * @param int $limit
     * @return Collection
     */
    public function get(int $limit = 5): Collection
    {
        return (new Collection($this->activities))->take($limit);
    }

    /**
     * @return mixed
     */
    private function getActivities()
    {
        $this->activities = [
            new Activity('Scalable Microservices with Kubernetes',
                'Free Udacity Course, learning to containerise applications with Docker and Kubernetes.',
                Carbon::createFromDate(2018, 07, 10),
                'https://eu.udacity.com/course/scalable-microservices-with-kubernetes--ud615'),
            new Activity('Chatbot',
                'Started following a tutorial on how to build a chatbot in PHP using Laravel and Botman.
                Check out my Github to follow my progress.',
                Carbon::createFromDate(2018, 07, 06),
                'https://github.com/ellllllen/chatbot'),
        ];

        return $this->activities;
    }


}