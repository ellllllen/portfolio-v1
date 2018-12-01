<?php

namespace Ellllllen\Http\Controllers\Articles;

use Ellllllen\PersonalWebsite\Articles\Article;
use Ellllllen\PersonalWebsite\Articles\Books\GetBooks;
use Illuminate\View\View;

class BooksController extends ShowArticle
{
    /**
     * @var GetBooks
     */
    private $getBooks;

    /**
     * BooksController constructor.
     * @param GetBooks $getBooks
     */
    public function __construct(GetBooks $getBooks)
    {
        $this->getBooks = $getBooks;
    }

    /**
     * @param Article $article
     * @return View
     */
    public function show(Article $article): View
    {
        return view('articles.show.books', compact('article'))
            ->with('books', $this->getBooks->get());
    }
}