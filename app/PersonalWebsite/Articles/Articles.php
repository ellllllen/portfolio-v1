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
    public function paginate(int $perPage = 2)
    {
        return Article::paginate($perPage);
    }

    /**
     * @return Collection|null
     */
    public function get()
    {
        return Article::get();
    }
}