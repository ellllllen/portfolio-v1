<?php

namespace Ellllllen\Portfolio\Activities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $timestamps = false;

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
    public function getStartDate()
    {
        return Carbon::createFromTimestamp(strtotime($this->start_date));
    }

    /**
     * @return string
     */
    public function getTitleLink(): string
    {
        return $this->title_link ?? "";
    }

    /**
     * @return bool
     */
    public function hasTitleLink(): bool
    {
        return $this->title_link ? true : false;
    }
}