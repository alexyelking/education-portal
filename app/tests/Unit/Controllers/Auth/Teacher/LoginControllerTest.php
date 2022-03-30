<?php
/**
 * Created by PhpStorm.
 * User: Sabrae
 * Date: 29.09.2019
 * Time: 17:30
 */

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Auth\Teacher\LoginController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{

    public function testLogout()
    {
        $respons = $this->get('/');

        $respons->assertStatus(200);
    }

    public function testLogin()
    {

        $respons = $this->post('teacher/login');

        $respons->assertStatus(419); // 419 Authentication Timeout (not in RFC 2616) («обычно ошибка проверки CSRF»)
        //$respons->assertSessionHasNoErrors();
    }



    public function testShowLoginForm()
    {
        $respons = $this->get('teacher/login');

        $respons->assertStatus(200);
    }
}
