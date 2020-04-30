<?php

namespace Tests\Browser;

use Ellllllen\Portfolio\Articles\Article;
use Ellllllen\Portfolio\Articles\Tags\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\AboutMePage;
use Tests\DuskTestCase;

class AboutMeTest extends DuskTestCase
{
    use DatabaseTransactions;

    /**
     * @test
     * @throws \Throwable
     */
    public function testAboutMePageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new AboutMePage())
                ->assertSourceHas('<h2 class="text-primary">About Me</h2>');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testBreadcrumb()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new AboutMePage())
                ->assertSourceHas('<ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . env('APP_URL') . '">Home</a></li> <li class="breadcrumb-item active">About Me</li></ol>')
                ->click('.breadcrumb:first-child a')
                ->assertUrlIs(env('APP_URL') . '/');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testGithubLinkWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new AboutMePage())
                ->clickLink('https://github.com/ellllllen');

            $browser = $this->createNewTab($browser);

            $browser->assertUrlIs('https://github.com/ellllllen');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testArticleTitleLinkWorks()
    {
        $article = Article::whereHas('tags', function ($q) {
            $q->where('tag_id', Tag::ABOUT_ME);
        })->latest()
            ->first();

        $this->browse(function (Browser $browser) use ($article) {
            $browser->visit(new AboutMePage())
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
        $article = Article::whereHas('tags', function ($q) {
            $q->where('tag_id', Tag::ABOUT_ME);
        })->latest()
            ->first();

        $this->browse(function (Browser $browser) use ($article) {
            $browser->visit(new AboutMePage())
                ->click('.articles img')
                ->assertUrlIs(env('APP_URL') . '/articles/' . $article->id);
        });
    }
}