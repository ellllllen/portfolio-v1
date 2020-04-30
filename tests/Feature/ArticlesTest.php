<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Ellllllen\Portfolio\Articles\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    use DatabaseTransactions;

    public function testPageLoads()
    {
        $response = $this->get('/articles')->dump();

        $response->assertStatus(200);
    }

    public function testBreadcrumb()
    {
        $response = $this->get('/articles');

        $response->assertStatus(200)
            ->assertSeeTextInOrder(['Home', 'Articles']);
    }

    public function testItDisplaysOneArticle()
    {
        factory(Article::class, 1)->create([
            'title' => 'Test Article',
        ]);

        $response = $this->get('/articles');

        $response->assertStatus(200)
            ->assertSee('Test Article');
    }

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
        $response->assertStatus(200)
            ->assertSeeTextInOrder($expected);
    }

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

        $response->assertStatus(200)
            ->assertSee('/articles?page=2');
    }

    public function testJavaScriptArticleLoads()
    {
        $response = $this->get('/articles/1');

        $response->assertStatus(200)
            ->assertSee('JavaScript');
    }

    public function testChildrensBookArticleLoads()
    {
        $response = $this->get('/articles/4');

        $response->assertStatus(200)
            ->assertSeeTextInOrder([
                "Book of Unusual Animals",
                "Pandy Goes Home"
            ]);
    }
}
