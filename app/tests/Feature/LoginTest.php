<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Teacher;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /*
     * Do not forget to switch to the test database, otherwise you will lose all data on the main database
     */
    use RefreshDatabase;

    /*
     * Public methods
     */
    protected function logoutRoute()
    {
        return route('logout');
    }

    protected function successfulLogoutRoute()
    {
        return '/';
    }

    protected function getTooManyLoginAttemptsMessage()
    {
        return sprintf('/^%s$/', str_replace('\:seconds', '\d+', preg_quote(__('auth.throttle'), '/')));
    }

    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    /*
     * User methods
     */
    protected function userLoginGetRoute()
    {
        return route('login');
    }

    protected function userLoginPostRoute()
    {
        return route('login');
    }

    protected function userSuccessfulLoginRoute()
    {
        return route('home');
    }

    /*
     * Teacher methods
     */
    protected function teacherLoginGetRoute()
    {
        return route('teacher.showLoginForm');
    }

    protected function teacherLoginPostRoute()
    {
        return route('teacher.loginRequest');
    }

    protected function teacherSuccessfulLoginRoute()
    {
        return route('teacher.dashboard');
    }

    /*
     * Admin methods
     */
    protected function adminLoginGetRoute()
    {
        return route('admin.showLoginForm');
    }

    protected function adminLoginPostRoute()
    {
        return route('admin.loginRequest');
    }

    protected function adminSuccessfulLoginRoute()
    {
        return route('admin.dashboard');
    }

    /*
     * User tests
     */
    public function testUserCanViewALoginForm()
    {
        $response = $this->get($this->userLoginGetRoute());
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function testUserCannotViewALoginFormWhenAuthenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get($this->userLoginGetRoute());
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testUserCanLoginWithCorrectCredentials()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);
        $response = $this->post($this->userLoginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect($this->userSuccessfulLoginRoute());
        $this->assertAuthenticatedAs($user);
    }

    public function testRememberMeFunctionalityForUser()
    {
        $user = factory(User::class)->create([
            'id' => random_int(1, 100),
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);
        $response = $this->post($this->userLoginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on',
        ]);
        $user = $user->fresh();
        $response->assertRedirect($this->userSuccessfulLoginRoute());
        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->id,
            $user->getRememberToken(),
            $user->password,
        ]));
        $this->assertAuthenticatedAs($user);
    }

    public function testUserCannotLoginWithIncorrectPassword()
    {
        $this->withoutMiddleware();
        $user = factory(User::class)->create([
            'password' => Hash::make('i-love-laravel'),
        ]);
        $response = $this->from($this->userLoginGetRoute())->post($this->userLoginPostRoute(), [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);
        $response->assertRedirect($this->userLoginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCannotLoginWithEmailThatDoesNotExist()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->userLoginGetRoute())->post($this->userLoginPostRoute(), [
            'email' => 'nobody@example.com',
            'password' => 'invalid-password',
        ]);
        $response->assertRedirect($this->userLoginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testUserCanLogout()
    {
        $this->be(factory(User::class)->create());
        $response = $this->post($this->logoutRoute());
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    public function testUserCannotLogoutWhenNotAuthenticated()
    {
        $response = $this->post($this->logoutRoute());
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    public function testUserCannotMakeMoreThanFiveAttemptsInOneMinute()
    {
        $this->withoutMiddleware();
        $user = factory(User::class)->create([
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);
        foreach (range(0, 5) as $_) {
            $response = $this->from($this->userLoginGetRoute())->post($this->userLoginPostRoute(), [
                'email' => $user->email,
                'password' => 'invalid-password',
            ]);
        }
        $response->assertRedirect($this->userLoginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertRegExp(
            $this->getTooManyLoginAttemptsMessage(),
            collect(
                $response
                    ->baseResponse
                    ->getSession()
                    ->get('errors')
                    ->getBag('default')
                    ->get('email')
            )->first()
        );
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /*
     * Teacher tests
     */
    public function testTeacherCanViewALoginForm()
    {
        $response = $this->get($this->teacherLoginGetRoute());
        $response->assertSuccessful();
        $response->assertViewIs('auth.teacher-login');
    }

    public function testTeacherCannotViewALoginFormWhenAuthenticated()
    {
        $teacher = factory(Teacher::class)->make();
        $response = $this->actingAs($teacher)->get($this->teacherLoginGetRoute());
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testTeacherCanLoginWithCorrectCredentials()
    {
        $teacher = factory(Teacher::class)->create([
            'password' => Hash::make($password = 'teacherPass'),
        ]);
        $response = $this->post($this->teacherLoginPostRoute(), [
            'email' => $teacher->email,
            'password' => $password,
        ]);
        $response->assertRedirect($this->teacherSuccessfulLoginRoute());
        $this->assertAuthenticatedAs($teacher, $guard = 'teacher');
    }

    public function testRememberMeFunctionalityForTeacher()
    {
        $teacher = factory(Teacher::class)->create([
            'id' => random_int(1, 100),
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);
        $response = $this->post($this->teacherLoginPostRoute(), [
            'email' => $teacher->email,
            'password' => $password,
            'remember' => 'on',
        ]);
        $teacher = $teacher->fresh();
        $response->assertRedirect($this->teacherSuccessfulLoginRoute());
        $response->assertCookie(Auth::guard($name = 'teacher')->getRecallerName(), vsprintf('%s|%s|%s', [
            $teacher->id,
            $teacher->getRememberToken(),
            $teacher->password,
        ]));
        $this->assertAuthenticatedAs($teacher, $guard = 'teacher');
    }

    public function testTeacherCannotLoginWithIncorrectPassword()
    {
        $this->withoutMiddleware();
        $teacher = factory(Teacher::class)->create([
            'password' => Hash::make('i-love-laravel'),
        ]);
        $response = $this->from($this->teacherLoginGetRoute())->post($this->teacherLoginPostRoute(), [
            'email' => $teacher->email,
            'password' => 'invalid-password',
        ]);
        $response->assertRedirect($this->teacherLoginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testTeacherCannotLoginWithEmailThatDoesNotExist()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->teacherLoginGetRoute())->post($this->teacherLoginPostRoute(), [
            'email' => 'nobody@example.com',
            'password' => 'invalid-password',
        ]);
        $response->assertRedirect($this->teacherLoginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testTeacherCanLogout()
    {
        $this->be(factory(Teacher::class)->create());
        $response = $this->post($this->logoutRoute());
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    public function testTeacherCannotLogoutWhenNotAuthenticated()
    {
        $response = $this->post($this->logoutRoute());
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    /*
     * Admin tests
     */
    public function testAdminCanViewALoginForm()
    {
        $response = $this->get($this->adminLoginGetRoute());
        $response->assertSuccessful();
        $response->assertViewIs('auth.admin-login');
    }

    public function testAdminCannotViewALoginFormWhenAuthenticated()
    {
        $admin = factory(Admin::class)->make();
        $response = $this->actingAs($admin)->get($this->adminLoginGetRoute());
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    public function testAdminCanLoginWithCorrectCredentials()
    {
        $admin = factory(Admin::class)->create([
            'password' => Hash::make($password = 'adminPass'),
        ]);
        $response = $this->post($this->adminLoginPostRoute(), [
            'email' => $admin->email,
            'password' => $password,
        ]);
        $response->assertRedirect($this->adminSuccessfulLoginRoute());
        $this->assertAuthenticatedAs($admin, $guard = 'admin');
    }

    public function testRememberMeFunctionalityForAdmin()
    {
        $admin = factory(Admin::class)->create([
            'id' => random_int(1, 100),
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);
        $response = $this->post($this->adminLoginPostRoute(), [
            'email' => $admin->email,
            'password' => $password,
            'remember' => 'on',
        ]);
        $admin = $admin->fresh();
        $response->assertRedirect($this->adminSuccessfulLoginRoute());
        $response->assertCookie(Auth::guard($name = 'admin')->getRecallerName(), vsprintf('%s|%s|%s', [
            $admin->id,
            $admin->getRememberToken(),
            $admin->password,
        ]));
        $this->assertAuthenticatedAs($admin, $guard = 'admin');
    }

    public function testAdminCannotLoginWithIncorrectPassword()
    {
        $this->withoutMiddleware();
        $admin = factory(Admin::class)->create([
            'password' => Hash::make('i-love-laravel'),
        ]);
        $response = $this->from($this->adminLoginGetRoute())->post($this->adminLoginPostRoute(), [
            'email' => $admin->email,
            'password' => 'invalid-password',
        ]);
        $response->assertRedirect($this->adminLoginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testAdminCannotLoginWithEmailThatDoesNotExist()
    {
        $this->withoutMiddleware();
        $response = $this->from($this->adminLoginGetRoute())->post($this->adminLoginPostRoute(), [
            'email' => 'nobody@example.com',
            'password' => 'invalid-password',
        ]);
        $response->assertRedirect($this->adminLoginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function testAdminCanLogout()
    {
        $this->be(factory(Admin::class)->create());
        $response = $this->post($this->logoutRoute());
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    public function testAdminCannotLogoutWhenNotAuthenticated()
    {
        $response = $this->post($this->logoutRoute());
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }
}