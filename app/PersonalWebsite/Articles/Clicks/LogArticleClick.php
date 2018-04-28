<?php

namespace Ellllllen\PersonalWebsite\Articles\Clicks;

use Ellllllen\PersonalWebsite\Articles\Article;

class LogArticleClick
{
    public function storeLog(Article $article, string $ip)
    {
        $articleClick = new ArticleClick();
        $articleClick->article_id = $article->id;
        $articleClick->ip = $ip;
        $articleClick->save();
    }
}
