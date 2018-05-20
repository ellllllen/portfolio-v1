<?php

namespace Ellllllen\PersonalWebsite\Articles\Clicks;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ArticleClicks
{
    /**
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage)
    {
        return ArticleClick::with('article')
            ->where('ip', '!=', env("MY_IP"))
            ->paginate($perPage);
    }
}