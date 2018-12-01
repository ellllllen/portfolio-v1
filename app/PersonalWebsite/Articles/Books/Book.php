<?php

namespace Ellllllen\PersonalWebsite\Articles\Books;

class Book
{
    use BookImages;

    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $directory;

    /**
     * Book constructor.
     * @param string $title
     * @param string $directory
     */
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

    /**
     * @return string
     */
    public function getImageFullDirectory(): string
    {
        return public_path("images/books/" . $this->getDirectory());
    }
}