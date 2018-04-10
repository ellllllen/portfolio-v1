<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Ellllllen\Presenter\Presenter;

class ArticlePresenter extends Presenter
{
    public function shortenedSection(): string
    {
        $section = strip_tags($this->section);
        $length = 500;

        return strlen($section) > $length ? substr($section, 0, $length) . '...' : $section;
    }
}