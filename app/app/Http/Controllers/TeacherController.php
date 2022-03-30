<?php

namespace App\Http\Controllers;

use Auth;
use App\Course;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher')->except('show');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $classrooms = Classroom::where('teacher_id', Auth::user()->id)->get();
        $courses = Course::where('created_by', Auth::user()->id)->get();
        return view('custom.teacher.dashboard', ['classrooms' => $classrooms, 'courses' => $courses]);
    }

    public function edit()
    {
        $teacher = Teacher::where('id', Auth::user()->id)->first();
        return view('custom.teacher.settings.edit', [
            'teacher' => $teacher,
        ]);
    }

    public function update(Request $request)
    {
        $teacher = Teacher::where('id', Auth::user()->id)->first();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->save();
        return redirect()->route('teacher_settings', $teacher);
    }

}
