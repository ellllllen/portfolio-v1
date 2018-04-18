<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Ellllllen\Presenter\PresenterInterface;
use Ellllllen\Presenter\PresenterTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements PresenterInterface
{
    use PresenterTrait;
    use SeparateControllerTrait;

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
}