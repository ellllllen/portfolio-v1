<?php

namespace Ellllllen\PersonalWebsite\Resources;

use Illuminate\Support\Collection;

interface ResourcesInterface
{
    public function all(): Collection;
}