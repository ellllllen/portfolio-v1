<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Ellllllen\Http\Controllers\Articles\ShowArticle;

trait SeparateControllerTrait
{
    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getSeparateControllers()
    {
        return config('article.separate-controllers');
    }

    /**
     * @return bool
     */
    public function hasSeparateController(): bool
    {
        /** @var ArticlePresenter $this */
        if (array_key_exists($this->id, $this->getSeparateControllers())) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function loadSeparateController()
    {
        /** @var ArticlePresenter $this */
        $controller = $this->getSeparateControllers()[$this->id];

        if (resolve($controller) instanceof ShowArticle) {
            /** @var ShowArticle $controller */
            return app()->call([resolve($controller), 'show'], ['article' => $this]);
        }

        throw new \InvalidArgumentException("Not a invalid ShowArticle controller");
    }
}