<?php

namespace Ellllllen\PersonalWebsite\Articles\Books;

use Exception;

trait BookImages
{
    /**
     * @return array
     * @throws Exception
     */
    public function getAllImages()
    {
        if (file_exists($this->getImageFullDirectory())) {
            return scandir($this->getImageFullDirectory());
        }

        throw new Exception("Book image folder does not exist");
    }

    public function getImagePath($image)
    {
        return $this->getImageFullDirectory() . '/' . $image;
    }

    public function doesImageExist($image)
    {
        if (is_file($this->getImagePath($image))) {
            return true;
        }

        return false;
    }
}