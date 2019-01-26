<?php

namespace Tests\Feature;

use Ellllllen\PersonalWebsite\Activities\ActivitiesInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testPageLoads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testItDisplayAnActivity()
    {
        /**
         * @var $activitiesInterface ActivitiesInterface
         */
        $activitiesInterface = app(ActivitiesInterface::class);
        $activities = $activitiesInterface->get(1);

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee($activities[0]->getTitle());
    }

    /**
     * @test
     */
//    public function testOnlyShowsLatestArticles()
//    {
//        /**
//         * @var $activitiesInterface ActivitiesInterface
//         */
//        $activitiesInterface = app(ActivitiesInterface::class);
//        $activities = $activitiesInterface->get(10);
//
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//        for ($count = 0; $count <= 4; $count++) {
//            $response->assertSee($activities[$count]->getTitle());
//        }
//        for ($count = 4; $count <= 9; $count++) {
//            $response->assertDontSee($activities[$count]->getTitle());
//        }
//    }
}
