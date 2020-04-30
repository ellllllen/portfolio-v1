<?php

namespace Tests\Feature;

use Ellllllen\Portfolio\Articles\Article;
use Ellllllen\Portfolio\Articles\Tags\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AboutMeTest extends TestCase
{
    use DatabaseTransactions;

    public function testPageLoads()
    {
        $response = $this->get('/about-me');

        $response->assertStatus(200);
    }

    public function testBreadcrumb()
    {
        $response = $this->get('/about-me');

        $response->assertStatus(200)
            ->assertSeeTextInOrder(['Home', 'About Me']);
    }

    public function testCanSeeContent()
    {
        $response = $this->get('/about-me');

        $developerTime = \Carbon\Carbon::now()->diffInYears(config('ellen.developerTime'));

        $response->assertStatus(200)
            ->assertSeeTextInOrder(["Hi", "Ellen", $developerTime]);
    }

    public function testItDisplaysAboutMeArticles()
    {
        $response = $this->get('/about-me');

        $response->assertStatus(200)
            ->assertSee('#bobthepanda');
    }

    public function testItDoesNotDisplayNonAboutMeArticles()
    {
        factory(Article::class, 1)->create([
            'title' => 'Test Notes Article',
        ])->each(function ($article) {
            $article->tags()->attach(factory(Tag::class)->make(), ['tag_id' => Tag::NOTES]);
        });

        $response = $this->get('/about-me');

        $response->assertStatus(200)
            ->assertDontSee('Test Notes Article');
    }
}