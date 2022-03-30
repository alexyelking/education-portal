<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Models\Module;
use App\Models\Teacher;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;


class ModuleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $teacher = Auth::user();

        if($teacher->can('create', [Module::class, $course]))
        {
            return view('module.create', ['course' => $course]);
        }else{
            return redirect()
            ->route('course.show', $course->id)
            ->with(['message'=>'Permission denied']);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $teacher = Auth::user();

        if($teacher->can('store', [Module::class, $course]))
        {
            $module = Module::create($request->input());
            $module->course_id = $course->id;
            $module->position = Module::where('course_id', $course->id)->max('position') + 1;

            $module->save();
            return redirect()->route('course.edit', $course);
        }else{
            return redirect()
            ->route('course.show', $course->id)
            ->with(['message'=>'Permission denied']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {

        $lessons = Lesson::where('module_id', $module->id)->get();

        return view('module.show', [
            'module' => $module,
            'lessons' => $lessons
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Module $module)
    {
        $teacher = Auth::user();

        if($teacher->can('edit', [$module]))
        {
            $lessons = Lesson::where('module_id', $module->id)->get();
            return view('module.edit', ['module' => $module, 'course' => $course, 'lessons' => $lessons]);
        }else{
            return redirect()
            ->route('course.show', $course->id)
            ->with(['message'=>'Permission denied']);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Module $module)
    {
        $teacher = Auth::user();
        if($teacher->can('update', [$module])){
            //dd($module);
            //dd($request->input());
            $module->update($request->all());
            $module->save();
            return redirect()->route('course.edit', [$course->id]);
        }else{
            return redirect()
            ->route('course.edit', $course->id)
            ->with(['message'=>'permission enied']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Module $module)
    {
        $teacher = Auth::user();
        if($teacher->can('destroy', [$module])){
            $module->delete();
            return redirect()->route('course.edit', $module->course_id);
        } else return redirect()
        ->route('course.edit', $module->course_id)
        ->with(['message'=>'permission denied']);
    }
}
