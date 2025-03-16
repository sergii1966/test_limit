<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserProfilerTest extends TestCase
{
    use RefreshDatabase;
    public function setUp():void
    {
        parent::setUp();

        Session::start();
    }

//    public function test_profile_when_user_login()
//    {
//        $user = User::factory()->create([
//            'password' => bcrypt($password = 'Y like testing'),
//        ]);
//
//        $this->post(route('login.process'), [
//            'email' => $user->email,
//            'password' => $password,
//        ]);
//
//        $this->assertAuthenticatedAs($user, 'web');
//    }

    public function test_profile_when_user_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'Y like testing'),
        ]);

        $this->post(route('login.process'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        Config::set('auth.max_users_from_ip', 10);
        //Auth::loginUsingId(1);
        $response = $this->get('/profile');

        $response->assertStatus(200);
    }

    public function test_profile_when_user_login_out()
    {
        $response = $this->get('/profile');

        $response->assertStatus(302)->assertRedirect('/login');
    }
}
