<?php

namespace Tests\Unit;

use Ellllllen\Portfolio\Articles\Articles;
use Ellllllen\Portfolio\Articles\GetArticles;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use Tests\TestCase;

class GetArticlesTest extends TestCase
{
    private $mockActivities;
    private $testClass;

    public function setUp(): void
    {
        $this->mockActivities = Mockery::mock(Articles::class);

        $this->testClass = new GetArticles($this->mockActivities, new FilesystemManager($this->app));
    }

    /**
     * @test
     */
    public function testPaginatesArticles()
    {
        $expected = new LengthAwarePaginator(null, 0, 10, 1);

        $this->mockActivities->shouldReceive('paginate')
            ->with('tag')
            ->andReturn($expected);

        $result = $this->testClass->paginate("tag");

        $this->assertEquals($expected, $result);
    }
}
