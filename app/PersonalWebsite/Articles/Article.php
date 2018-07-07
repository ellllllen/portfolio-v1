<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Ellllllen\Presenter\PresenterTrait;
use Illuminate\Database\Eloquent\Model;
use Ellllllen\PersonalWebsite\Articles\Tags\Tag;
use Ellllllen\Presenter\PresenterInterface;
use Ellllllen\PersonalWebsite\Articles\Clicks\ArticleClick;

class Article extends Model implements PresenterInterface
{
    use PresenterTrait;
    use SeparateControllerTrait;

    protected $presenter = ArticlePresenter::class;

    protected $fillable = ['title', 'image', 'section', 'view'];

    public function articleClicks()
    {
        return $this->hasMany(ArticleClick::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getPublicImage(): string
    {
        return "/storage/images/{$this->image}";
    }

    public function getImageFullPath(): string
    {
        return "/public/images/{$this->image}";
    }
}
