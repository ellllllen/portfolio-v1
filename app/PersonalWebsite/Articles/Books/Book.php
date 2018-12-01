<?php

namespace Ellllllen\PersonalWebsite\Articles\Books;

class Book
{
    use BookImages;

    const BOOK_IMAGE_DIRECTORY = "images/books/";

    private $title;
    private $directory;

    public function __construct(string $title, string $directory)
    {
        $this->title = $title;
        $this->directory = $directory;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return $this->directory;
    }

    public function getImageFullDirectory(): string
    {
        return static::BOOK_IMAGE_DIRECTORY . $this->getDirectory();
    }
}