<?php

namespace Ellllllen\PersonalWebsite\Articles\Books;

use Illuminate\Support\Collection;

class Books implements BooksInterface
{
    public function all(): Collection
    {
        return collect([
            new Book("Evie's Book of Unusual Animals", '02'),
            new Book("Pandy Goes Home", '01'),
        ]);
    }
}
