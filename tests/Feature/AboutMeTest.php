<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AboutMeTest extends TestCase
{
    /**
     * @test
     */
    public function testPageLoads()
    {
        $response = $this->get('/about-me');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function testBreadcrumb()
    {
        $response = $this->get('/about-me');

        $response->assertSeeTextInOrder(['Home', 'About Me']);
    }

    public function testCanSeeContent()
    {
        $response = $this->get('/about-me');

        $response->assertSeeTextInOrder(['Home', 'About Me']);

    }
}