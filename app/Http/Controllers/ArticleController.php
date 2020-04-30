<?php

namespace Ellllllen\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Ellllllen\Portfolio\Articles\GetArticles;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * @var GetArticles
     */
    private $getArticles;
    /**
     * @var Request
     */
    private $request;

    public function __construct(GetArticles $getArticles, Request $request)
    {
        $this->getArticles = $getArticles;
        $this->request = $request;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('articles.index')->with('articles', $this->getArticles->paginate());
    }

    /**
     * @param int $articleID
     * @return Factory|View
     */
    public function show(int $articleID)
    {
        $article = $this->getArticles->findOrFail($articleID);

        if ($article->hasSeparateController()) {
            return $article->loadSeparateController();
        }

        return view('articles.show', compact('article'));
    }
}
