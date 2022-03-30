<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherRegisterRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Models\Teacher;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * @var string
     */
    protected $redirectTo = '/teacher';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
//        $this->middleware('guest:admin');
        $this->middleware('guest:teacher');
    }

    public function showRegisterForm()
    {
        return view('auth.teacher-register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param TeacherRegisterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(TeacherRegisterRequest $request)// получаем объект класса TeacherRegisterRequest. Там правила и сообщения
    {
        event(new Registered($teacher = $this->create($request->all()))); //Dispatch an event and call the listeners (отправляем событие и вызываем слушателя)
        // ()

        Auth::guard('teacher')->login($teacher, false);

//        return $this->registered($request, $teacher)
//            ?: redirect(route('teacher.dashboard'));
        //dd(__METHOD__, $teacher, $request);
        return redirect('/teacher');
    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array $data
     * @return \App\Models\Teacher
     */
    protected function create(array $data)
    {
        return Teacher::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
