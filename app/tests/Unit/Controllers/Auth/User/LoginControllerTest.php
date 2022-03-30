<?php
/**
 * Created by PhpStorm.
 * User: Sabrae
 * Date: 30.09.2019
 * Time: 17:17
 */

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Auth\User\LoginController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function testShowLoginForm()
    {
        $respons = $this->get('user/login');

        $respons->assertStatus(200);
    }

    public function testLogin()
    {
        $respons = $this->post('user/login');

        $respons->assertStatus(419);
    }

    public function testLogout()
    {
        $respons = $this->get('/');

        $respons->assertStatus(200);
    }

}
