<?php

namespace Ellllllen\PersonalWebsite\Activities;

class GetActivities
{
    /**
     * @var Activities
     */
    private $activities;

    /**
     * GetActivities constructor.
     * @param Activities $activities
     */
    public function __construct(Activities $activities)
    {
        $this->activities = $activities;
    }

    public function get(int $limit = 5)
    {
        return $this->activities->get($limit);
    }
}