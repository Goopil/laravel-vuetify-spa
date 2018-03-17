<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Login;

class LoginTest extends DuskTestCase
{
    public function setUp()
    {
        parent::setup();

        static::closeAll();
    }

    /** @test */
    public function login_with_valid_credentials()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login())
                ->submit($user->email, 'secret12345')
                ->assertPageIs(Home::class);
        });
    }

    /** @test */
    public function login_with_invalid_credentials()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Login())
                ->submit('test@test.app', 'secret12345')
                ->assertSee('These credentials do not match our records.')
                ->assertPageIs(Login::class);
        });
    }

    /** @test */
    public function log_out_the_user()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login())
                ->submit($user->email, 'secret12345')
                ->on(new Home())
                ->clickLogout()
                ->assertPageIs(Login::class);
        });
    }
}
