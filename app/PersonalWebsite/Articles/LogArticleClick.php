<?php

namespace Ellllllen\PersonalWebsite\Articles;

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