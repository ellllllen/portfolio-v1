<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testPageLoads()
    {
        $response = $this->get('/login');

        $response->assertStatus(200)
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function testBreadcrumb()
    {
        $response = $this->get('/login');

        $response->assertStatus(200)
            ->assertSeeTextInOrder(['Home', 'Login']);
    }

    /**
     * @test
     */
    public function testDisplaysContent()
    {
        $response = $this->get('/login');

        $response->assertStatus(200)
            ->assertSeeTextInOrder(['E-Mail Address', 'Password', 'Remember Me', 'Login']);
    }
}