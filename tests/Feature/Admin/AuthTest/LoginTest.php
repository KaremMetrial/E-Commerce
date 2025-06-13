<?php

namespace Tests\Feature\Admin\AuthTest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_admin_login_page_is_accessible()
    {
        $this->withoutMiddleware([
            \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            \Mcamara\LaravelLocalization\Middleware\LocalizationRedirect::class,
            \Mcamara\LaravelLocalization\Middleware\LocaleViewPath::class,
        ]);

        $response = $this->get(route('dashboard.login.form'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.auth.login');
    }
}
