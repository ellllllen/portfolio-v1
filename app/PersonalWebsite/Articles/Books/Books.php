<?php

namespace Ellllllen\PersonalWebsite\Books;

use Illuminate\Support\Collection;

class Books implements BooksInterface
{
    public function all(): Collection
    {
        return collect([
            new Book('test', 'test'),
        ]);
    }
}