<?php

namespace Ellllllen\Resources;

class Resource
{
    public $name;
    public $url;
    public $description;
    public $data;

    public static function create($name, $url, $description, $data = ""): Resource
    {
        $resource = new Resource();
        $resource->name = $name;
        $resource->url = $url;
        $resource->description = $description;
        $resource->data = $data;

        return $resource;
    }

    public function getBladeTemplate(): string
    {
        $name = strtolower(str_replace(' ', '', $this->name));

        return "resources._{$name}";
    }
}