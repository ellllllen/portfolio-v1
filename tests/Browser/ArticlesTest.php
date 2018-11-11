<?php

namespace Tests\Browser;

use Ellllllen\PersonalWebsite\Articles\Article;
use Tests\Browser\Pages\ArticlesPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticlesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @throws \Throwable
     */
    public function testArticlesPageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ArticlesPage())
                ->assertSourceHas('<h2 class="text-primary">Articles</h2>');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testBreadcrumb()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ArticlesPage())
                ->assertSourceHas('<ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . env('APP_URL') . '">Home</a></li> <li class="breadcrumb-item active">Articles</li></ol>')
                ->click('.breadcrumb:first-child a')
                ->assertUrlIs(env('APP_URL') . '/');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testArticleTitleLinkWorks()
    {
        $article = factory(Article::class)->create([
            'title' => 'Test Article',
        ]);

        $this->browse(function (Browser $browser) use ($article) {
            $browser->visit(new ArticlesPage())
                ->clickLink($article->title)
                ->assertUrlIs(env('APP_URL') . '/articles/' . $article->id);
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testArticleImageLinkWorks()
    {
        $article = factory(Article::class)->create();

        $this->browse(function (Browser $browser) use ($article) {
            $browser->visit(new ArticlesPage())
                ->click('.articles img')
                ->assertUrlIs(env('APP_URL') . '/articles/' . $article->id);
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testArticlePaginationNumberLinksWork()
    {
        $articles = factory(Article::class, 20)->create();

        $this->browse(function (Browser $browser) use ($articles) {
            $browser->visit(new ArticlesPage())
                ->click('.page-item a')
                ->assertQueryStringHas('page', 2)
                ->click('.page-item a')
                ->assertQueryStringHas('page', 1);
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testArticlePaginationArrowLinksWork()
    {
        $articles = factory(Article::class, 20)->create();

        $this->browse(function (Browser $browser) use ($articles) {
            $browser->visit(new ArticlesPage())
                ->click('.page-item:last-of-type .page-link')
                ->assertQueryStringHas('page', 2)
                ->click('.page-item:first-of-type .page-link')
                ->assertQueryStringHas('page', 1);
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testBreadcrumbOnShowPage()
    {
        $article = factory(Article::class)->create();

        $this->browse(function (Browser $browser) use ($article) {
            $browser->visit('/articles/' . $article->id)
                ->assertSourceHas('<ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . env('APP_URL') . '">Home</a></li> <li class="breadcrumb-item"><a href="' . env('APP_URL') . '/articles">Articles</a></li> <li class="breadcrumb-item active">' . $article->title . '</li></ol>')
                ->click('.breadcrumb:first-child a')
                ->assertUrlIs(env('APP_URL') . '/');
        });
    }
}
