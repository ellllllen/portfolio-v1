<?php

use Ellllllen\PersonalWebsite\Articles\Article;
use Ellllllen\PersonalWebsite\Articles\Tags\Tag;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 50)->create()
            ->each(function ($article) {
                $article->tags()->attach(factory(Tag::class)->make(), [
                        'tag_id' => array_random(Tag::DEFAULT_TAGS)
                ]);
            });
    }
}
