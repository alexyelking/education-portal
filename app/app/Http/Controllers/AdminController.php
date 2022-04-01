<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Teacher;
use App\User;
use Auth;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Exception
     */
    public function index()
    {
        $one = random_int(100, 200);
        $two = random_int(300, 700);
        $derevo = random_int(800, 999);
        $four = random_int(800, 1600);
        return view('custom.admin.dashboard',[
            'one' => $one,
            'two' => $two,
            'derevo' => $derevo,
            'four' => $four
        ]);
    }

    public function show(Request $request)
    {
        if ($user = Admin::where('id', $request->id)->first()) {
            //"Password protection"
            $user->password = NULL;
        } else {
            //Redirect to yourself
            $user = Admin::where('id', Auth::user()->id)->first();
        }

        //dd(__METHOD__, $user, $request);

        return view('custom.admin.profile', [
            'user' => $user,
        ]);

    }

    public function showUsersList()
    {
        return view('custom.admin.users_list', [
            'users' => User::paginate(10)
        ]);
    }

    public function showTeachersList()
    {
        return view('custom.admin.users_list', [
            'users' => Teacher::paginate(10)
        ]);
    }

    public function showAdminsList()
    {
        return view('custom.admin.users_list', [
            'users' => Admin::paginate(10)
        ]);
    }

    public function edit()
    {
        $user = Admin::where('id', Auth::user()->id)->first();
        return view('custom.user.settings.edit', [
            'user' => $user,
        ]);
    }

}
