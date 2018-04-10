<?php

namespace Ellllllen\Presenter;

interface PresenterInterface
{
    /**
     * Prepare a new or cached presenter instance
     *
     * @return mixed
     */
    public function present();
}