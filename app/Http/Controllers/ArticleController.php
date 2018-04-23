<?php

namespace Ellllllen\Http\Controllers;

use Ellllllen\PersonalWebsite\Articles\GetArticles;
use Ellllllen\PersonalWebsite\Articles\LogArticleClick;
use Ellllllen\PersonalWebsite\Articles\ManageArticles;
use Illuminate\Http\Request;

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
    /**
     * @var ManageArticles
     */
    private $manageArticles;

    public function __construct(GetArticles $getArticles, Request $request, ManageArticles $manageArticles)
    {
        $this->getArticles = $getArticles;
        $this->request = $request;
        $this->manageArticles = $manageArticles;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('articles.index')->with('articles', $this->getArticles->paginate());
    }

    /**
     * @param int $articleID
     * @param LogArticleClick $logArticleClick
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $articleID, LogArticleClick $logArticleClick)
    {
        $article = $this->getArticles->findOrFail($articleID);

        $logArticleClick->storeLog($article, $this->request->ip());

        if ($article->hasSeparateController()) {
            return $article->loadSeparateController();
        }

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $this->validate($this->request, [
            'title' => ['required', 'unique:articles,title'],
            'section' => 'required',
            'image' => ['required', 'image']
        ]);

        $this->manageArticles->store($this->request->all());

        return redirect()->route('home');
    }

    public function destroy(int $articleID)
    {
        $article = $this->getArticles->findOrFail($articleID);

        $this->manageArticles->destroy($article);

        return redirect()->route('articles.index');
    }

    public function edit(int $articleID)
    {
        $article = $this->getArticles->findOrFail($articleID);

        return view('articles.edit', compact('article'));
    }

    public function update(int $articleID)
    {
        $article = $this->getArticles->findOrFail($articleID);

        $this->validate($this->request, [
            'title' => ['required', "unique:articles,title,{$articleID},id"],
            'section' => 'required',
            'image' => ['image']
        ]);

        $this->manageArticles->update($this->request->all(), $article);

        return redirect()->route('articles.show', ['id' => $article->id]);
    }
}