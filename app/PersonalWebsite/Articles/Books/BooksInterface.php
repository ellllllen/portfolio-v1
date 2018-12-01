<?php

namespace Ellllllen\PersonalWebsite\Articles\Books;

use Illuminate\Support\Collection;

interface BooksInterface
{
    public function all(): Collection;
}