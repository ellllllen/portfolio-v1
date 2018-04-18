<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Ellllllen\Http\Controllers\Articles\ShowArticle;

trait SeparateControllerTrait
{
    public function getSeparateControllers()
    {
        return config('article.separate-controllers');
    }

    public function hasSeparateController(): bool
    {
        if (array_key_exists($this->id, $this->getSeparateControllers())) {
            return true;
        }

        return false;
    }

    public function loadSeparateController()
    {
        if ($this->hasSeparateController()) {
            $controller = $this->getSeparateControllers()[$this->id];

            if (resolve($controller) instanceof ShowArticle) {
                return app()->call([resolve($controller), 'show'], ['article' => $this]);
            }

            throw new \InvalidArgumentException("Not a invalid ShowArticle controller");
        }
    }
}