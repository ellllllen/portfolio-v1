<?php

namespace Tests\Feature;

use Ellllllen\PersonalWebsite\Articles\Article;
use Ellllllen\PersonalWebsite\Articles\Tags\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AboutMeTest extends TestCase
{
    use RefreshDatabase;

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

    /**
     * @test
     */
    public function testCanSeeContent()
    {
        $response = $this->get('/about-me');

        $developerTime = \Carbon\Carbon::now()->diffInYears(config('ellen.developerTime'));

        $response->assertSeeTextInOrder(["Hi, I'm Ellen", $developerTime]);
    }

    /**
     * @test
     */
    public function testItDisplaysAboutMeArticles()
    {
        factory(Article::class, 1)->create([
            'title' => 'Test About Me Article',
        ])->each(function ($article) {
            $article->tags()->attach(factory(Tag::class)->make(), ['tag_id' => Tag::ABOUT_ME]);
        });

        $response = $this->get('/about-me');

        $response->assertSee('Test About Me Article');
    }

    /**
     * @test
     */
    public function testItDoesNotDisplayNonAboutMeArticles()
    {
        factory(Article::class, 1)->create([
            'title' => 'Test Notes Article',
        ])->each(function ($article) {
            $article->tags()->attach(factory(Tag::class)->make(), ['tag_id' => Tag::NOTES]);
        });

        $response = $this->get('/about-me');

        $response->assertDontSee('Test Notes Article');
    }

    /**
     * @test
     */
    public function testItDoesNotDisplayAboutMeArticlesWithoutImageFile()
    {
        factory(Article::class, 1)->create([
            'title' => 'Test Article Without Image',
            'image' => 'this_file_does_not_exist.jpg',
        ])->each(function ($article) {
            $article->tags()->attach(factory(Tag::class)->make(), ['tag_id' => Tag::ABOUT_ME]);
        });

        $response = $this->get('/');
        $response->assertDontSee('Test Article Without Image');
    }
}