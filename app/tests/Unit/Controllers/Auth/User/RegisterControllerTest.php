<?php
/**
 * Created by PhpStorm.
 * User: Sabrae
 * Date: 30.09.2019
 * Time: 17:29
 */

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Auth\User\RegisterController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{

    public function testRegister()
    {
        $respons = $this->get('user/register');

        $respons->assertStatus(200);
    }

    public function testShowRegisterForm()
    {

    }
}
