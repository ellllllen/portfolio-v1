<?php

namespace Tests\Browser;

use Carbon\Carbon;
use Ellllllen\PersonalWebsite\Articles\Article;
use Tests\Browser\Pages\WelcomePage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WelcomeTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @throws \Throwable
     */
    public function testHomePageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage)
                ->assertSee('Latest Articles');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testNoArticlesDisplaysMessage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage)
                ->assertSee("Sorry, I haven't posted any articles yet");
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testItDisplaysOneArticles()
    {
        factory(Article::class, 1)->create(['title' => 'Test Article']);

        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage)
                ->assertSee('Test Article')
                ->assertDontSee("Sorry, I haven't posted any articles yet");
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testItDoesNotDisplayArticlesWithoutImageFile()
    {
        factory(Article::class, 1)->create([
            'title' => 'Test Article',
            'image' => 'blahblahblah.jpg',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage)
                ->assertDontSee('Test Article')
                ->assertSee("Sorry, I haven't posted any articles yet");
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testArticleLinkWorks()
    {
        factory(Article::class, 1)->create([
            'title' => 'Test Article',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage)
                ->clickLink('Test Article')
                ->assertUrlIs(env('APP_URL') . '/articles/1');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testOnlyShowsLatestArticles()
    {
        for ($count = 1; $count <= 9; $count++) {
            factory(Article::class, 1)->create([
                'title' => "Test Article {$count}",
                'updated_at' => Carbon::now()->addSecond($count),
            ]);
        }

        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage);
            for ($count = 1; $count <= 4; $count++) {
                $browser->assertDontSee('Test Article ' . $count);
            }
            for ($count = 5; $count <= 9; $count++) {
                $browser->assertSee('Test Article ' . $count);
            }
        });
    }
}
