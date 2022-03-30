<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('setlocale/{locale}', 'LocaleController@setLocale')->name('setLocale');

// Users
Route::prefix('user')->group(function () {
    Route::get('/register', 'Auth\User\RegisterController@showRegisterForm')->name('user.showRegisterForm');
    Route::post('register', 'Auth\User\RegisterController@register')->name('user.registerRequest');

    Route::get('/login', 'Auth\User\LoginController@showLoginForm')->name('user.showLoginForm');
    Route::post('/login', 'Auth\User\LoginController@login')->name('user.loginRequest');

    Route::get('/myaccount', 'UserController@edit')->name('user_settings');
    Route::put('/myaccount/save', 'UserController@update')->name('user_settings_save');

    Route::get('/', 'UserController@index')->name('user.dashboard');

    Route::get('logout', 'Auth\User\LoginController@logout')->name('user.logout');
});

// Admins
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::post('/login', 'Auth\Admin\LoginController@login')->name('admin.loginRequest');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/profile/{id}', 'AdminController@show')->name('admin_profile');
    Route::get('/profile/edit', 'AdminController@edit')->name('admin_profile_settings');
    Route::get('/tables/users', 'AdminController@showUsersList')->name('users.list');
    Route::get('/tables/teachers', 'AdminController@showTeachersList')->name('teachers.list');
    Route::get('/tables/admins', 'AdminController@showAdminsList')->name('admins.list');

    Route::get('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');
});

// Teachers
Route::prefix('teacher')->group(function () {
    Route::get('/register', 'Auth\Teacher\RegisterController@showRegisterForm')->name('teacher.showRegisterForm');
    Route::post('register', 'Auth\Teacher\RegisterController@register')->name('teacher.registerRequest');

    Route::get('/login', 'Auth\Teacher\LoginController@showLoginForm')->name('teacher.showLoginForm');
    Route::post('/login', 'Auth\Teacher\LoginController@login')->name('teacher.loginRequest');

    Route::get('/', 'TeacherController@index')->name('teacher.dashboard');

    Route::get('/myaccount', 'TeacherController@edit')->name('teacher_settings');
    Route::put('/myaccount/save', 'TeacherController@update')->name('teacher_settings_save');

    Route::resource('/course', 'CourseController');

    Route::resource('/course/{course}/module', 'ModuleController');
    Route::resource('/module/{module}/lesson', 'LessonController');
    Route::resource('/lesson/{lesson}/textBlock', 'TextBlockController');
    Route::resource('/lesson/{lesson}/videoBlock', 'VideoBlockController');
    Route::resource('/lesson/{lesson}/taskBlock', 'TaskBlockController');
    Route::resource('/taskBlock/{taskBlock}/simpleQuestion', 'SimpleQuestionController');
    Route::resource('/taskBlock/{taskBlock}/testQuestion', 'TestQuestionController');
    Route::resource('/testQuestion/{testQuestion}/testAnswer', 'TestAnswerController');

    Route::resource('/classroom', 'ClassroomController');

    Route::resource('/classroom/{classroom}/user/{user}/invite', 'ClassroomInviteController', [
        'names' => [
            'store' => 'classroomInvite.store',
            'create' => 'classroomInvite.create',
            'show' => 'classroomInvite.show',
            'destroy' => 'classroomInvite.destroy',
        ]
    ]);

    Route::get('/logout', 'Auth\Teacher\LoginController@logout')->name('teacher.logout');
});


// Redefinition of some routes (Elkin)
Route::get('/course/{course}', 'CourseController@show')->name('course.show');
//Route::put('/classroom/{classroom}', 'ClassroomController@update')->name('classroom.update');
