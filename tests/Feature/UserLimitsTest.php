<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserLimitsTest extends TestCase
{
    use RefreshDatabase;
    public function setUp():void
    {
        parent::setUp();

        Session::start();
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'Y like testing'),
        ]);

        $this->post(route('login.process'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($user, 'web');
    }

    public function test_user_limits()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'Y like testing'),
        ]);

        $this->post(route('login.process'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $this->get(route('profile'));

        $this->assertGuest();
    }
}
