<?php

namespace Tests\Browser;

use Ellllllen\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends DuskTestCase
{
    const TEST_PASSWORD = 'hello1234R4y56!hfdsj';

    /**
     * @test
     * @throws \Throwable
     */
    public function testLoginPageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Login');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testThatUnknownEmailCannotLogin()
    {
        $user = $this->createTestUser();

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'wrong@email.com')
                ->type('password', static::TEST_PASSWORD)
                ->press('Login')
                ->assertSee('These credentials do not match our records.')
                ->assertUrlIs(env('APP_URL') . '/login');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testThatUnknownPasswordCannotLogin()
    {
        $user = $this->createTestUser();

        $this->browse(function (Browser $browser) use ($user) {
            /** @var $user User */
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'wrong password')
                ->press('Login')
                ->assertSee('These credentials do not match our records.')
                ->assertUrlIs(env('APP_URL') . '/login');
        });
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function testUserCanLogin()
    {
        $user = $this->createTestUser();

        $this->browse(function (Browser $browser) use ($user) {
            /** @var $user User */
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', static::TEST_PASSWORD)
                ->press('Login')
                ->assertSee($user->name)
                ->assertAuthenticated();
        });
    }

    /**
     * Create test user for login test
     */
    private function createTestUser()
    {
        return factory(User::class)->create([
            'name' => 'Hello Test',
            'email' => 'test@example.com',
            'password' => bcrypt(static::TEST_PASSWORD)
        ]);
    }
}
