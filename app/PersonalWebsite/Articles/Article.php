<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getBackgroundImage(): string
    {
        return "/images/blog/{$this->image}";
    }
}