<?php

namespace App\Policies;

use App\Models\Teacher;
use App\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param Module $module
     */
    public function  create(Teacher $teacher, Module $module){

        //dd(__METHOD__, $course);

        $course = Course::where('id', $module->course_id)->first();
        return $teacher->id == $course->created_by;
    }

    public function  store(Teacher $teacher, Module $module)
    {
        $course = Course::where('id', $module->course_id)->first();
        return $teacher->id == $course->created_by;
    }

    public function  edit(Teacher $teacher, Lesson $lesson)
    {
        $module = Module::where('id', $lesson->module_id)->first();
        $course = Course::where('id', $module->course_id)->first();
        //dd($lesson, $course, $teacher);
       return $teacher->id == $course->created_by;
    }

    public function  update(Teacher $teacher, Lesson $lesson)
    {
        $module = Module::where('id', $lesson->module_id)->first();
        $course = Course::where('id', $module->course_id)->first();
        return $teacher->id == $course->created_by;
    }

    public function  destroy(Teacher $teacher, Lesson $lesson)
    {
        $module = Module::where('id', $lesson->module_id)->first();
        $course = Course::where('id', $module->course_id)->first();
        return $teacher->id == $course->created_by;
    }

    /*public function  forceDelete(Teacher $teacher, Lesson $lesson, Course $course)
    {
        //return $lesson->course_id == $course->id && $teacher->id == $course->creator_id;
    }*/
}
