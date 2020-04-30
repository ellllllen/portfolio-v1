<?php

namespace Ellllllen\Portfolio\Activities;

use Illuminate\Support\Collection;

interface ActivitiesInterface
{
    /**
     * @param int $limit
     * @return Collection
     */
    public function get(int $limit = 5): Collection;
}