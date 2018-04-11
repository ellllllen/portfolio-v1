<?php

namespace Ellllllen\PersonalWebsite\Resources;

use Illuminate\Support\Collection;

class GetResources
{
    /**
     * @var ResourcesInterface
     */
    private $resources;

    /**
     * GetResources constructor.
     * @param ResourcesInterface $resources
     */
    public function __construct(ResourcesInterface $resources)
    {
        $this->resources = $resources;
    }

    public function get(): Collection
    {
        return $this->resources->all();
    }
}