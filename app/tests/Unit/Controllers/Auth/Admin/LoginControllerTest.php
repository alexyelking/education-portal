<?php
/**
 * Created by PhpStorm.
 * User: Sabrae
 * Date: 27.09.2019
 * Time: 22:52
 */

use App\Http\Controllers\Auth\Admin\LoginController;
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

    public function testShowLoginForm()
    {
        $respons = $this->get('admin/login');

        $respons->assertStatus(200);
    }

    public function testLogin()
    {
        $respons = $this->post('admin/login');

        $respons->assertStatus(419); // 419 Authentication Timeout (not in RFC 2616) («обычно ошибка проверки CSRF»)
    }
}
