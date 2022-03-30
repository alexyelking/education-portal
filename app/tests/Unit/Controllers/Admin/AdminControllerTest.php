<?php
/**
 * Created by PhpStorm.
 * User: Sabrae
 * Date: 25.09.2019
 * Time: 13:47
 */

namespace App\Http\Controllers;

//use PHPUnit\Framework\TestCase;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{

    public function testShowTeachersList()
    {
        $response = $this->get('admin/tables/teachers');

        //$response->assertStatus(200);
        $response->assertRedirect();
    }

    public function testEdit()
    {
        $response = $this->get('admin/profile/edit');

        //$response->assertStatus(200);
        $response->assertRedirect();
    }

    public function testIndex()
    {
        //$response = $this->get(route('admin.dashboard', [], 'false'));
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testShowUsersList()
    {
        $response = $this->get('admin/tables/users');

        //$response->assertStatus(200);
        $response->assertRedirect();
    }

    public function testShow()
    {
        $response = $this->get('admin/profile/1');

        //$response->assertStatus(200);
        $response->assertRedirect();
    }

    public function testShowAdminsList()
    {
        $response = $this->get('admin/tables/admins');

        //$response->assertStatus(200);
        $response->assertRedirect();
    }
}
//TODO: Сделать авторизацию под админа в тестах!
