<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\CvPage;
use Tests\DuskTestCase;

class CvTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @throws \Throwable
     */
    public function testCvPageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new CvPage())
                ->assertSourceHas('<h2 class="text-primary">Curriculum Vitae</h2>');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testBreadcrumb()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new CvPage())
                ->assertSourceHas('<ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . env('APP_URL') . '">Home</a></li> <li class="breadcrumb-item active">Curriculum Vitae</li></ol>')
                ->click('.breadcrumb:first-child a')
                ->assertUrlIs(env('APP_URL') . '/');
        });
    }
}