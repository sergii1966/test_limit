<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;
    public function setUp():void
    {
        parent::setUp();

        Session::start();

        $this->user = [
            'id' => 1,
            'name' => 'Sergii',
            'email' => 'serhii@gmaill.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => '123456',
            'password_confirmation' => '123456',
            //'remember_token' => csrf_token(),
            '_token' => csrf_token()
        ];
    }

    public function test_user_can_view_a_register_form()
    {
        $response = $this->get(route('register.form'));

        $response->assertSuccessful();
        $response->assertViewIs('auth.register-form');
    }

    public function test_validation_email_empty_form_request_register(): void
    {
        unset($this->user['email']);

        $response = $this->post(route('register.process'), $this->user);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_validation_password_empty_form_request_register(): void
    {
        unset($this->user['password']);

        $response = $this->post(route('register.process'), $this->user);

        $response->assertSessionHasErrors(['password']);
    }

    public function test_validation_password_confirmation_empty_form_request_register(): void
    {
        unset($this->user['password_confirmation']);

        $response = $this->post(route('register.process'), $this->user);

        $response->assertSessionHasErrors(['password']);
    }

    public function test_user_register(): void
    {

        Artisan::call('migrate');

        $response = $this->post(route('register.process'), $this->user);

        $response->assertRedirect(route('login.form'));
    }

    public function test_validation_email_unique_form_request_register(): void
    {
        Artisan::call('migrate');

        $this->post(route('register.process'), $this->user);

        $response = $this->post(route('register.process'), $this->user);

        $response->assertSessionHasErrors(['email']);
    }
}
