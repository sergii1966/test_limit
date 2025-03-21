<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;
    public function setUp():void
    {
        parent::setUp();

        Session::start();
    }

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get(route('login.form'));

        $response->assertSuccessful();

        $response->assertViewIs('auth.login-form');
    }

    public function test_user_can_login_with_correct_email_and_password()
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

    public function test_user_can_logout(){
        $user = User::factory()->create([
            'password' => bcrypt($password = 'Y like testing'),
        ]);

        $this->post(route('login.process'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $this->get(route('login.out.process'));

        $this->assertGuest();
    }

    public function test_user_redirect_to_profile_page(){
        $user = User::factory()->create([
            'password' => bcrypt($password = 'Y like testing'),
        ]);

        $response = $this->post(route('login.process'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect(route('profile'));
    }
}
