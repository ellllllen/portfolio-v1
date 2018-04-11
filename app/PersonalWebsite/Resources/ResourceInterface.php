<?php

namespace Ellllllen\PersonalWebsite\Resources;

interface ResourceInterface
{
    public function getBladeTemplate(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    public function getData();
}