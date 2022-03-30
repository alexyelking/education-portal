<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Requests\Teacher\TeacherLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.teacher-login');
    }

    //TODO: tests for "if"

    /**
     * @param TeacherLoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(TeacherLoginRequest $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect('/teacher');
        }

        return redirect('/teacher');
//        $credentials = [
//            'email' => $request->email,
//            'password' => $request->password,
//        ];
//
//        if (Auth::guard('teacher')->attempt($credentials, $request->remember)) {
//            return redirect()->intended(route('teacher.dashboard'));
//        }
//        return back()
//            ->withErrors(['email' => "Wrong email or password"])
//            ->withInput($request
//                ->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();

        return redirect('/');
    }
}