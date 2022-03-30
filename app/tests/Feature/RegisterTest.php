<?php

namespace Tests\Feature\Auth;

use App\Models\Teacher;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /*
     * Do not forget to switch to the test database, otherwise you will lose all data on the main database
     * Registration tests for the admin at the moment are not possible, since there is no such functionality
     */
    use RefreshDatabase;

    /*
     * Public methods
     */
    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    /*
     * User methods
     */
    protected function userRegisterGetRoute()
    {
        return route('register');
    }

    protected function userRegisterPostRoute()
    {
        return route('register');
    }

    protected function userSuccessfulRegistrationRoute()
    {
        return route('home');
    }

    /*
     * Teacher methods
     */
    protected function teacherRegisterGetRoute()
    {
        return route('teacher.showRegisterForm');
    }

    protected function teacherRegisterPostRoute()
    {
        return route('teacher.registerRequest');
    }

    protected function teacherSuccessfulRegistrationRoute()
    {
        return route('teacher.dashboard');
    }

    /*
     * User tests
     */
    public function testUserCanViewARegistrationForm()
    {
        $response = $this->get($this->userRegisterGetRoute());
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function testUserCannotViewARegistrationFormWhenAuthenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get($this->userRegisterGetRoute());
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testUserCanRegister()
    {
        Event::fake();
        $response = $this->from($this->userRegisterGetRoute())->post($this->userRegisterPostRoute(), [
            'name' => 'Alex',
            'email' => '123@123.123',
            'password' => '123123123',
            'password_confirmation' => '123123123',
        ]);
        $users = User::all();
        $response->assertRedirect($this->userSuccessfulRegistrationRoute());
        $this->assertCount(1, $users);
        $this->assertAuthenticatedAs($user = $users->first());
        $this->assertEquals('Alex', $user->name);
        $this->assertEquals('123@123.123', $user->email);
        $this->assertTrue(Hash::check('123123123', $user->password));
        Event::assertDispatched(Registered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }

    public function testUserCannotRegisterWithoutName()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->userRegisterGetRoute())->post($this->userRegisterPostRoute(), [
            'name' => '',
            'email' => '123@123.123',
            'password' => '123123123',
            'password_confirmation' => '123123123',
        ]);
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->userRegisterGetRoute());
        $response->assertSessionHasErrors('name');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutEmail()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->userRegisterGetRoute())->post($this->userRegisterPostRoute(), [
            'name' => 'Alex',
            'email' => '',
            'password' => '123123123',
            'password_confirmation' => '123123123',
        ]);
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->userRegisterGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithInvalidEmail()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->userRegisterGetRoute())->post($this->userRegisterPostRoute(), [
            'name' => 'Alex',
            'email' => 'invalid-email',
            'password' => '123123123',
            'password_confirmation' => '123123123',
        ]);
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->userRegisterGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutPassword()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->userRegisterGetRoute())->post($this->userRegisterPostRoute(), [
            'name' => 'Alex',
            'email' => '123@123.123',
            'password' => '',
            'password_confirmation' => '',
        ]);
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->userRegisterGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithoutPasswordConfirmation()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->userRegisterGetRoute())->post($this->userRegisterPostRoute(), [
            'name' => 'Alex',
            'email' => '123@123.123',
            'password' => '123123123',
            'password_confirmation' => '',
        ]);
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->userRegisterGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotRegisterWithPasswordsNotMatching()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->userRegisterGetRoute())->post($this->userRegisterPostRoute(), [
            'name' => 'Alex',
            'email' => '123@123.123',
            'password' => '123123123',
            'password_confirmation' => 'invalid-pass-conf',
        ]);
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->userRegisterGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /*
     * Teacher tests
     */
    public function testTeacherCanViewARegistrationForm()
    {
        $response = $this->get($this->teacherRegisterGetRoute());
        $response->assertSuccessful();
        $response->assertViewIs('auth.teacher-register');
    }

    public function testTeacherCannotViewARegistrationFormWhenAuthenticated()
    {
        $teacher = factory(Teacher::class)->make();
        $response = $this->actingAs($teacher)->get($this->teacherRegisterGetRoute());
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testTeacherCanRegister()
    {
        Event::fake();
        $response = $this->from($this->teacherRegisterGetRoute())->post($this->teacherRegisterPostRoute(), [
            'name' => 'AlexTeacher',
            'email' => '123@123.123',
            'password' => '123123123',
            'password_confirmation' => '123123123',
        ]);
        $teacher = Teacher::all();
        $response->assertRedirect($this->teacherSuccessfulRegistrationRoute());
        $this->assertCount(1, $teacher);
        $this->assertAuthenticatedAs($teacher = $teacher->first(), $guard = 'teacher');
        $this->assertEquals('AlexTeacher', $teacher->name);
        $this->assertEquals('123@123.123', $teacher->email);
        $this->assertTrue(Hash::check('123123123', $teacher->password));
        Event::assertDispatched(Registered::class, function ($e) use ($teacher) {
            return $e->user->id === $teacher->id;
        });
    }

    public function testTeacherCannotRegisterWithoutName()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->teacherRegisterGetRoute())->post($this->teacherRegisterPostRoute(), [
            'name' => '',
            'email' => '123@123.123',
            'password' => '123123123',
            'password_confirmation' => '123123123',
        ]);
        $teacher = Teacher::all();
        $this->assertCount(0, $teacher);
        $response->assertRedirect($this->teacherRegisterGetRoute());
        $response->assertSessionHasErrors('name');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testTeacherCannotRegisterWithoutEmail()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->teacherRegisterGetRoute())->post($this->teacherRegisterPostRoute(), [
            'name' => 'AlexTeacher',
            'email' => '',
            'password' => '123123123',
            'password_confirmation' => '123123123',
        ]);
        $teacher = Teacher::all();
        $this->assertCount(0, $teacher);
        $response->assertRedirect($this->teacherRegisterGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testTeacherCannotRegisterWithInvalidEmail()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->teacherRegisterGetRoute())->post($this->teacherRegisterPostRoute(), [
            'name' => 'AlexTeacher',
            'email' => 'invalid-email',
            'password' => '123123123',
            'password_confirmation' => '123123123',
        ]);
        $teacher = Teacher::all();
        $this->assertCount(0, $teacher);
        $response->assertRedirect($this->teacherRegisterGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testTeacherCannotRegisterWithoutPassword()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->teacherRegisterGetRoute())->post($this->teacherRegisterPostRoute(), [
            'name' => 'AlexTeacher',
            'email' => '123@123.123',
            'password' => '',
            'password_confirmation' => '',
        ]);
        $teacher = Teacher::all();
        $this->assertCount(0, $teacher);
        $response->assertRedirect($this->teacherRegisterGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testTeacherCannotRegisterWithoutPasswordConfirmation()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->teacherRegisterGetRoute())->post($this->teacherRegisterPostRoute(), [
            'name' => 'AlexTeacher',
            'email' => '123@123.123',
            'password' => '123123123',
            'password_confirmation' => '',
        ]);
        $teacher = Teacher::all();
        $this->assertCount(0, $teacher);
        $response->assertRedirect($this->teacherRegisterGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testTeacherCannotRegisterWithPasswordsNotMatching()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->teacherRegisterGetRoute())->post($this->teacherRegisterPostRoute(), [
            'name' => 'AlexTeacher',
            'email' => '123123123',
            'password' => '123123123',
            'password_confirmation' => 'invalid-pass-conf',
        ]);
        $teacher = Teacher::all();
        $this->assertCount(0, $teacher);
        $response->assertRedirect($this->teacherRegisterGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}