<?php

namespace Ellllllen\PersonalWebsite\Resources;

class Resource implements ResourceInterface
{
    private $name;
    private $url;
    private $description;
    private $data;

    public function __construct(string $name, string $url, string $description, $data = "")
    {
        $this->name = $name;
        $this->url = $url;
        $this->description = $description;
        $this->data = $data;
    }

    public function getBladeTemplate(): string
    {
        $name = strtolower(str_replace(' ', '', $this->name));

        return "resources._{$name}";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getData()
    {
        return $this->data;
    }
}