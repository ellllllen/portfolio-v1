<?php

namespace Tests\Browser;

use Ellllllen\PersonalWebsite\Resources\Resource;
use Ellllllen\PersonalWebsite\Resources\ResourcesInterface;
use Tests\Browser\Pages\ResourcesPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ResourcesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @throws \Throwable
     */
    public function testResourcesPageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ResourcesPage())
                ->assertSourceHas('<h2 class="text-primary">Resources</h2>');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testBreadcrumb()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ResourcesPage())
                ->assertSourceHas('<ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . env('APP_URL') . '">Home</a></li> <li class="breadcrumb-item active">Resources</li></ol>')
                ->click('.breadcrumb:first-child a')
                ->assertUrlIs(env('APP_URL') . '/');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testResourcesTitleLinkWorks()
    {
        $resourcesInterface = app(ResourcesInterface::class);
        $resources = $resourcesInterface->all();

        $this->browse(function (Browser $browser) use ($resources) {
            foreach ($resources as $resource) {
                /** @var Resource $resource */

                $browser->visit(new ResourcesPage())
                    ->clickLink($resource->getName());

                $browser = $this->createNewTab($browser);

                $browser->assertUrlIs($resource->getUrl());
            }
        });
    }
}
