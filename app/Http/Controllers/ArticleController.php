<?php namespace Ellllllen\Http\Controllers;


use Ellllllen\PersonalWebsite\Articles\Article;
use Ellllllen\PersonalWebsite\Articles\GetArticles;

class ArticleController extends Controller
{
    /**
     * @var GetArticles
     */
    private $getArticles;

    /**
     * BlogController constructor.
     * @param GetArticles $getArticles
     */
    public function __construct(GetArticles $getArticles)
    {
        $this->getArticles = $getArticles;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('articles.index')->with('articles', $this->getArticles->paginate());
    }

    public function show($articleID)
    {
        $article = Article::findOrFail($articleID);

        return view($article->view ? "articles.{$article->view}" : "articles.show")
            ->with('article', $article);
    }
} 