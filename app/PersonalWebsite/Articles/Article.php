<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Ellllllen\Presenter\PresenterInterface;
use Ellllllen\Presenter\PresenterTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements PresenterInterface
{
    use PresenterTrait;

    protected $presenter = ArticlePresenter::class;

    protected $fillable = ['title', 'image', 'section', 'view'];

    public function getPublicImage(): string
    {
        return "/storage/images/{$this->image}";
    }

    public function getImageFullPath(): string
    {
        return "/public/images/{$this->image}";
    }

    public function hasView(): bool
    {
        return view()->exists($this->getFullView());
    }

    public function getFullView(): string
    {
        return "articles.extra_content.{$this->view}";
    }
}