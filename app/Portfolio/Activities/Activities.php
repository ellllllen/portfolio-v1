<?php

namespace Ellllllen\Portfolio\Activities;

use Illuminate\Support\Collection;

class Activities implements ActivitiesInterface
{
    /**
     * @param int $limit
     * @return Collection
     */
    public function get(int $limit = 5): Collection
    {
        return Activity::limit($limit)
            ->orderBy('start_date', 'desc')
            ->get();
    }
}