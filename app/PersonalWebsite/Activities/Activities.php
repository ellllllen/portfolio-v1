<?php

namespace Ellllllen\PersonalWebsite\Activities;

use Illuminate\Support\Collection;

class Activities implements ActivitiesInterface
{
    private $activities;

    public function __construct()
    {
        $this->activities = $this->getActivities();
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
     * @return array
     */
    private function getActivities()
    {
        $activities = [];

        foreach (trans('activities') as $activity) {
            if (isset($activity['display']) && $activity['display'] === 1) {
                $activities[] = new Activity($activity['title'], $activity['description'],
                    $activity['startDate'], $activity['titleLink']);
            }
        }

        return $activities;
    }
}