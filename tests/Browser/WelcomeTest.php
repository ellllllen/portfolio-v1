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
