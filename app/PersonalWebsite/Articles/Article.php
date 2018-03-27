<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getBackgroundImage(): string
    {
        return "/storage/images/{$this->image}";
    }

    public function getImageFullPath(): string
    {
        return "/public/images/{$this->image}";
    }
}