<?php

namespace Ellllllen\Portfolio\Articles\Books;

use Illuminate\Support\Collection;

interface BooksInterface
{
    public function all(): Collection;
}