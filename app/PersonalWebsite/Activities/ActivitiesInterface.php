<?php

namespace Ellllllen\PersonalWebsite\Activities;

use Illuminate\Support\Collection;

interface ActivitiesInterface
{
    /**
     * @param int $limit
     * @return Collection
     */
    public function get(int $limit = 5): Collection;
}