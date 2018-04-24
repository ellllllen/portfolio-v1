<?php

use Ellllllen\Http\Controllers\Articles\BooksController;
use Ellllllen\Http\Controllers\Articles\JavaScriptController;
use Ellllllen\Http\Controllers\Articles\LearnVueController;

return [
    'separate-controllers' => [
        1 => JavaScriptController::class,
        4 => BooksController::class,
        5 => LearnVueController::class
    ]
];