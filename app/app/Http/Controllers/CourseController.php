<?php

namespace App\Http\Controllers;

use App\Course;
use App\Models\Module;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        // Not yet required
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create', [
            'course' => [],
            'delimiter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());
        $course->tags = str_replace(' ', '', $request->tags);
        $course->created_by = Auth::user()->id;

        if (!empty($request->file('image'))) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $course->image = $url;
        }
        $course->save();
        return redirect()->route('teacher.dashboard');
    }


    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $modules = Module::where('course_id', $course->id)->get();
        foreach($modules as $module)
        {
            $module->lessons = Lesson::where('module_id', $module->id)->get();
        }
        //dd($lessons);
        return view('course.show', [
            'course' => $course,
            'modules' => $modules
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $teacher = Auth::user();

        if ($teacher->can('edit', $course)) {
            $modules = Module::where('course_id', $course->id)->get();
            foreach($modules as $module)
            {
                $module->lessons = Lesson::where('module_id', $module->id)->get();
            }
            return view('course.edit', [
                'course' => $course,
                'modules' => $modules,
                'delimiter' => ''
            ]);
        } else return redirect()->route('course.show', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $teacher = Auth::user();
        if ($teacher->can('update', $course)) {
            $course->update($request->except('slug'));
            $course->tags = str_replace(' ', '', $request->tags);;
            if (!empty($request->file('image'))) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $course->image = $url;
            }
            $course->save();
            return redirect()->route('teacher.dashboard');
        } else return redirect()->route('teacher.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Course $course)
    {
        $teacher = Auth::user();
        if ($teacher->can('destroy', $course)) {
            $course->delete();
            return redirect()->route('teacher.dashboard');
        } else return redirect()->route('course.show', $course);

    }
}
