<?php

namespace Ellllllen\PersonalWebsite\Activities;

use Carbon\Carbon;

class Activity
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $description;
    /**
     * @var Carbon
     */
    private $startDate;

    /**
     * Activity constructor.
     * @param string $title
     * @param string $description
     * @param Carbon $startDate
     */
    public function __construct(string $title, string $description, Carbon $startDate)
    {
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return Carbon
     */
    public function getStartDate(): Carbon
    {
        return $this->startDate;
    }
}