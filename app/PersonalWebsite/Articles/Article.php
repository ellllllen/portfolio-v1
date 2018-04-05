<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class Article extends Model
{
    protected $fillable = ['title', 'image', 'section', 'view'];

    public function getPublicImage(): string
    {
        return "/storage/images/{$this->image}";
    }

    public function getImageFullPath(): string
    {
        return "/public/images/{$this->image}";
    }

    public function presentShortenedSection(): string
    {
        $section = strip_tags($this->section);
        $length = 500;

        return strlen($section) > $length ? substr($section, 0, $length) . '...' : $section;
    }

    public function hasView(): bool
    {
        return View::exists($this->getFullView());
    }

    public function getFullView(): string
    {
        return "articles.{$this->view}";
    }
}