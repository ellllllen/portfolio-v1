<?php

namespace Ellllllen\PersonalWebsite\Articles\Clicks;

use Ellllllen\PersonalWebsite\Articles\Articles;
use Illuminate\Support\Carbon;

class GetArticleClicks
{
    private $articles;
    /**
     * @var ArticleClicks
     */
    private $articleClicks;

    /**
     * GetArticleClicks constructor.
     * @param Articles $articles
     * @param ArticleClicks $articleClicks
     */
    public function __construct(Articles $articles, ArticleClicks $articleClicks)
    {
        $this->articles = $articles;
        $this->articleClicks = $articleClicks;
    }

    /**
     * @return array
     */
    public function getChartData()
    {
        $clicks = [];

        $articles = $this->articles->getWithClicks();

        foreach ($articles as $article) {
            for ($m = 0; $m < 12; $m++) {
                $clicks[$article->title][Carbon::createFromDate(2018, 04)->addMonths($m)->format('m-Y')] = 0;
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

    /**
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage = 20)
    {
        return $this->articleClicks->paginate($perPage);
    }
}
