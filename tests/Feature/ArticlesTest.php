<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Ellllllen\PersonalWebsite\Articles\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testItDisplaysOneArticle()
    {
        factory(Article::class, 1)->create([
            'title' => 'Test Article',
        ]);

        $response = $this->get('/articles');

        $response->assertSee('Test Article');
    }

    /**
     * @test
     */
    public function testItDisplaysArticlesInOrder()
    {
        for ($count = 1; $count <= 9; $count++) {
            factory(Article::class, 1)->create([
                'title' => "Test Article {$count}",
                'created_at' => Carbon::now()->addSecond($count),
            ]);
        }

        $response = $this->get('/articles');

        $expected = [];
        for ($count = 9; $count <= 1; $count--) {
            $expected[] = "Test Article {$count}";
        }
        $response->assertSeeTextInOrder($expected);
    }

    /**
     * @test
     */
    public function testPaginatesArticles()
    {
        for ($count = 1; $count <= 20; $count++) {
            factory(Article::class, 1)->create([
                'title' => "Test Article {$count}",
                'updated_at' => Carbon::now()->addSecond($count),
            ]);
        }

        $response = $this->get('/articles?page=1');
        for ($count = 20; $count <= 11; $count--) {
            $response->assertSee('Test Article ' . $count);
        }
        for ($count = 10; $count <= 1; $count--) {
            $response->assertDontSee('Test Article ' . $count);
        }

        $response->assertSee('/articles?page=2');
    }

    /**
     * @test
     */
    public function testHavingNoArticlesDisplaysAMessage()
    {
        $response = $this->get('/articles');

        $response->assertSee(trans('articles.no_results'));
    }
}