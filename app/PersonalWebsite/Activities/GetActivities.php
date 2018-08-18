<?php

namespace Ellllllen\PersonalWebsite\Activities;

use Illuminate\Support\Collection;

class GetActivities
{
    /**
     * @var Activities
     */
    private $activities;

    /**
     * GetActivities constructor.
     * @param ActivitiesInterface $activities
     */
    public function __construct(ActivitiesInterface $activities)
    {
        $this->activities = $activities;
    }

    /**
     * @param int $limit
     * @return Collection
     */
    public function get(int $limit = 5): Collection
    {
        return $this->activities->get($limit);
    }
}