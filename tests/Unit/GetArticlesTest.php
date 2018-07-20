<?php

namespace Tests\Unit;

use Ellllllen\PersonalWebsite\Articles\Articles;
use Ellllllen\PersonalWebsite\Articles\GetArticles;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use Tests\TestCase;

class GetArticlesTest extends TestCase
{
    private $mockActivities;
    private $testClass;

    public function setUp()
    {
        $this->mockActivities = Mockery::mock(Articles::class);

        $this->testClass = new GetArticles($this->mockActivities, new FilesystemManager($this->app));
    }

    /**
     * @test
     */
    public function it_paginates_articles()
    {
        $expected = new LengthAwarePaginator(null, 0, 10);

        $this->mockActivities->shouldReceive('paginate')
            ->with('tag')
            ->andReturn($expected);

        $result = $this->testClass->paginate("tag");

        $this->assertEquals($expected, $result);
    }
}
