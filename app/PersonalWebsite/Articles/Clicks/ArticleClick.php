<?php

namespace Ellllllen\PersonalWebsite\Articles\Clicks;

use Ellllllen\PersonalWebsite\Articles\Article;
use Illuminate\Database\Eloquent\Model;

class ArticleClick extends Model
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
