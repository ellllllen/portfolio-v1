<?php

namespace Tests\Browser;

use Ellllllen\PersonalWebsite\Articles\Article;
use Ellllllen\PersonalWebsite\Articles\Tags\Tag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\AboutMePage;
use Tests\DuskTestCase;

class AboutMeTest extends DuskTestCase
{
    use DatabaseMigrations;

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
        $article = factory(Article::class)->create();
        $article->tags()->attach(factory(Tag::class)->make(), [
            'tag_id' => Tag::ABOUT_ME
        ]);

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
        $article = factory(Article::class)->create();
        $article->tags()->attach(factory(Tag::class)->make(), [
            'tag_id' => Tag::ABOUT_ME
        ]);

        $this->browse(function (Browser $browser) use ($article) {
            $browser->visit(new AboutMePage())
                ->click('.articles img')
                ->assertUrlIs(env('APP_URL') . '/articles/' . $article->id);
        });
    }
}