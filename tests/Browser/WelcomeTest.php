<?php

namespace Tests\Browser;

use Ellllllen\PersonalWebsite\Activities\ActivitiesInterface;
use Ellllllen\PersonalWebsite\Activities\Activity;
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
                ->assertSee('My Activity Feed');
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
    public function testArticlesImageLinkWorks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new WelcomePage())
                ->mouseover('.articles a')
                ->assertSeeIn('.articles a', 'Articles');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
//    public function testActivityLinkWorks()
//    {
//        $activitiesInterface = app(ActivitiesInterface::class);
//        $activities = $activitiesInterface->get(100);
//
//        $this->browse(function (Browser $browser) use ($activities) {
//            foreach ($activities as $activity) {
//                /** @var Activity $activity */
//
//                if ($activity->hasTitleLink()) {
//                    $browser->visit(new WelcomePage())
//                        ->clickLink($activity->getTitle());
//
//                    $browser = $this->createNewTab($browser);
//
//                    $browser->assertUrlIs($activity->getTitleLink());
//                }
//            }
//        });
//    }

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
