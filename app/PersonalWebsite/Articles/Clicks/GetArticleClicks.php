<?php

namespace Ellllllen\PersonalWebsite\Articles\Clicks;

use Ellllllen\PersonalWebsite\Articles\Articles;
use Illuminate\Support\Carbon;

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
            for ($m = 0; $m < 12; $m++) {
                $clicks[$article->title][Carbon::now()->addMonths($m)->format('m-Y')] = 0;
            }

            foreach ($article->articleClicks as $click) {
                if (isset($clicks[$article->title][$click->created_at->format('m-Y')])) {
                    $clicks[$article->title][$click->created_at->format('m-Y')]++;
                } else {
                    $clicks[$article->title][$click->created_at->format('m-Y')] = 1;
                }
            }
        }

        return $clicks;
    }
}
