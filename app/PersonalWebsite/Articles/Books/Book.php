<?php

namespace Ellllllen\PersonalWebsite\Books;

class Book
{
    private $name;
    private $filePath;

    public function __construct(string $name, string $filePath)
    {
        $this->name = $name;
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }
}