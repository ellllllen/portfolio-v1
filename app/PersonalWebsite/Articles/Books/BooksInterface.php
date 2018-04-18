<?php

namespace Ellllllen\PersonalWebsite\Books;

use Illuminate\Support\Collection;

interface BooksInterface
{
    public function all(): Collection;
}