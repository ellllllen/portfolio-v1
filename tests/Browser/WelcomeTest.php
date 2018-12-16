<?php

namespace Tests\Browser;

use Ellllllen\PersonalWebsite\Activities\ActivitiesInterface;
use Ellllllen\PersonalWebsite\Activities\Activity;
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
            $browser->visit(new WelcomePage())
                ->assertSee('Latest Articles');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testAboutMeImageLinkWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage())
                ->mouseover('.about-me a')
                ->assertSeeIn('.about-me a', 'About Me');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testCvImageLinkWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage())
                ->mouseover('.cv a')
                ->assertSeeIn('.cv a', 'Curriculum Vitae');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testResourcesImageLinkWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage())
                ->mouseover('.resources a')
                ->assertSeeIn('.resources a', 'Resources');
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
            $browser->visit(new WelcomePage())
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
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage())
                ->click('.articles img')
                ->assertUrlIs(env('APP_URL') . '/articles/5');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testAllArticlesLinkWorks()
    {
        factory(Article::class)->create();

        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage())
                ->clickLink('View all my Articles')
                ->assertUrlIs(env('APP_URL') . '/articles');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testActivityLinkWorks()
    {
        $activitiesInterface = app(ActivitiesInterface::class);
        $activities = $activitiesInterface->get(100);

        $this->browse(function (Browser $browser) use ($activities) {
            foreach ($activities as $activity) {
                /** @var Activity $activity */

                if ($activity->hasTitleLink()) {
                    $browser->visit(new WelcomePage())
                        ->clickLink($activity->getTitle());

                    $browser = $this->createNewTab($browser);

                    $browser->assertUrlIs($activity->getTitleLink());
                }
            }
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testAboutMeLinkWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage())
                ->clickLink('Find out more about me')
                ->assertUrlIs(env('APP_URL') . '/about-me');
        });
    }
}
