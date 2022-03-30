<?php
/**
 * Created by PhpStorm.
 * User: Sabrae
 * Date: 29.09.2019
 * Time: 17:48
 */

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Auth\Teacher\RegisterController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{

    public function testShowRegisterForm()
    {
        $respons = $this->get('teacher/register');

        $respons->assertStatus(200);
    }

    public function testRegister()
    {
        /*//POST,
        $respons = $this->get('/teacher');

        $respons->assertStatus(200);*/
    }

}
