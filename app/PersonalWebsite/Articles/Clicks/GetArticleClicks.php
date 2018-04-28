<?php

namespace Ellllllen\PersonalWebsite\Articles\Clicks;

use Ellllllen\PersonalWebsite\Articles\Articles;

class GetArticleClicks
{
    private $articles;

    public function __construct(Articles $articles)
    {
        $this->articles = $articles;
    }

    public function getChartData()
    {
        $clicks = [];

        $articles = $this->articles->getWithClicks();


        foreach ($articles as $article) {
            foreach ($article->articleClicks as $click) {
                if (isset($clicks[$article->title][$click->created_at->format('m-Y')])) {
                    $clicks[$article->title][$click->created_at->format('m-Y')]++;
                } else {
                    $clicks[$article->title][$click->created_at->format('m-Y')] = 0;
                }
            }
        }

        return $clicks;
    }
}
