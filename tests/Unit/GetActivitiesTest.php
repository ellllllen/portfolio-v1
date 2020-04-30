<?php

namespace Tests\Unit;

use Ellllllen\Portfolio\Activities\ActivitiesInterface;
use Ellllllen\Portfolio\Activities\GetActivities;
use Illuminate\Support\Collection;
use Mockery;
use Tests\TestCase;

class GetActivitiesTest extends TestCase
{
    private $testClass;
    /**
     * @var ActivitiesInterface|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    private $mockActivities;

    public function setUp(): void
    {
        parent::setUp();

        $this->mockActivities = Mockery::mock(ActivitiesInterface::class);

        $this->testClass = new GetActivities($this->mockActivities);
    }

    /**
     * @test
     */
    public function testGetsActivitiesWithALimit()
    {
        $expected = new Collection();
        $this->mockActivities->shouldReceive('get')
            ->with(1000)
            ->andReturn($expected);

        $result = $this->testClass->get(1000);

        $this->assertEquals($expected, $result);
    }
}
