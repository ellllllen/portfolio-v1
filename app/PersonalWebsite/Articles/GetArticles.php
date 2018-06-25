<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Filesystem\FilesystemManager;

class GetArticles
{
    /**
     * @var Articles
     */
    private $articles;
    /**
     * @var FilesystemManager
     */
    private $filesystemManager;

    /**
     * GetArticles constructor.
     * @param Articles $articles
     * @param FilesystemManager $filesystemManager
     */
    public function __construct(Articles $articles, FilesystemManager $filesystemManager)
    {
        $this->articles = $articles;
        $this->filesystemManager = $filesystemManager;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|null
     */
    public function paginate($tag = null)
    {
        return $this->articles->paginate($tag);
    }

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function get()
    {
        $articles = $this->articles->get();

        //filter out articles that don't have valid images to display
        return $articles->filter(function (Article $value, $key) {
            if ($this->filesystemManager->exists($value->getImageFullPath())) {
                return true;
            }
            return false;
        });
    }

    public function findOrFail($articleID): Article
    {
        return Article::findOrFail($articleID);
    }
}