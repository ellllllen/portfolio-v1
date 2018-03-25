<?php

namespace Ellllllen\PersonalWebsite\Articles;

class GetArticles
{
    /**
     * @var Articles
     */
    private $articles;

    /**
     * GetArticles constructor.
     * @param Articles $articles
     */
    public function __construct(Articles $articles)
    {
        $this->articles = $articles;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|null
     */
    public function paginate()
    {
        return $this->articles->paginate();
    }
}