<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class Articles
{
    /**
     * @param int $perPage
     * @return LengthAwarePaginator|null
     */
    public function paginate(int $perPage = 5)
    {
        return Article::orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * @return Collection|null
     */
    public function get()
    {
        return Article::orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @return Collection|null
     */
    public function getWithClicks()
    {
        return Article::with('articleClicks')
            ->get();
    }
}
