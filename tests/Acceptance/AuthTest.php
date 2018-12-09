<?php

namespace CodePress\CodeCategory\Testing;


use CodePress\CodeUser\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class AuthTest extends \TestCase
{
    use DatabaseTransactions;

    protected function createRouteAdmin()
    {
        Route::group(['middleware' => ['web' , 'auth']], function(){
            Route::get('/admin/test', function (){
              return 'Admin Test!';
            });
        });
    }

    protected function getUser()
    {
        return User::all()->first();
    }

    public function test_can_login_in_application()
    {
        $this->visit('/login')
            ->type('user@email', 'email')
            ->type('123456','password')
            ->press('Login')
            ->seePageIs('/')
            ->see('Dashboard');
    }

    public function test_cannot_login_in_application()
    {
        $this->visit('/login')
            ->type('outrouser@email', 'email')
            ->type('123456','password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('password');
    }

    public function test_can_logout_in_application()
    {
        $this->createRouteAdmin();

        $this->actingAs($this->getUser())
            ->visit('/logout')
            ->seePageIs('/');

        $this->actingAs($this->getUser())
            ->visit('/logout')
            ->visit('admin/test')
            ->seePageIs('/login')
            ->see('password');
    }

    public function test_can_access_route_with_middleware_auth()
    {
        $this->createRouteAdmin();
        $this->actingAs($this->getUser())
            ->visit('admin/test')
            ->see('Admin Test!');
    }


}