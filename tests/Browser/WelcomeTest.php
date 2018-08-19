<?php

namespace Tests\Browser;

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
     * @todo NOT TESTED DUE TO DUSK NOT RUNNING CORRECTLY
     * @test
     * @throws \Throwable
     */
//    public function testAboutPageImageLinkWorks()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit(new WelcomePage)
//                ->mouseover('.about-me a')
//                ->assertSeeIn('.about-me a', trans('about_me.title'));
//        });
//    }

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
}
