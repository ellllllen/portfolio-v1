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
     * @var string
     */
    private $titleLink;

    /**
     * Activity constructor.
     * @param string $title
     * @param string $description
     * @param Carbon $startDate
     * @param string $titleLink
     */
    public function __construct(string $title, string $description, Carbon $startDate, string $titleLink = "")
    {
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->titleLink = $titleLink;
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

    /**
     * @return string
     */
    public function getTitleLink(): string
    {
        return $this->titleLink ?? "";
    }

    /**
     * @return bool
     */
    public function hasTitleLink(): bool
    {
        return $this->titleLink ? true : false;
    }
}