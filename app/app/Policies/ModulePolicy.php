<?php

namespace App\Policies;

use App\User;
use App\Models\Module;
use App\Models\Teacher;
use App\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any courses.
     *
     * @param Teacher $teacher
     * @return mixed
     */
    public function viewAny(Teacher $teacher)
    {
        // Not required
    }

    /**
     * Determine whether the user can view the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function view(Teacher $teacher, Course $course)
    {
        // Not required
    }

    /**
     * Determine whether the user can create courses.
     *
     * @param Teacher $teacher
     * @return mixed
     */
    public function create(Teacher $teacher, Course $course)
    {
        // This makes the middleware(auth:teacher) in the CourseController
        return $teacher->id == $course->created_by;
    }


    /**
     * Determine whether the user can create courses.
     *
     * @param Teacher $teacher
     * @return mixed
     */
    public function store(Teacher $teacher, Course $course)
    {
        // This makes the middleware(auth:teacher) in the CourseController
        return $teacher->id == $course->created_by;
    }

    /**
     * Determine whether the user can edit the course.
     *
     * @param User $teacher
     * @param  \App\Models\Module $module
     * @return mixed
     */
    public function edit(Teacher $teacher, Module $module)
    {
        return $teacher->id == $module->course->created_by;
    }

    /**
     * Determine whether the user can update the course.
     *
     * @param Teacher $teacher
     * @param  \App\Models\Module $module
     * @return mixed
     */
    public function update(Teacher $teacher, Module $module)
    {
        return $teacher->id == $module->course->created_by;
    }

    /**
     * Determine whether the user can delete the course.
     *
     * @param Teacher $teacher
     * @param  \App\Models\Module
     * @return mixed
     */
    public function destroy(Teacher $teacher, Module $module)
    {
        return $teacher->id == $module->course->created_by;
    }

    /**
     * Determine whether the user can restore the course.
     *
     * @param Teacher $teacher
     * @param  \App\Models\Module; $module
     * @return mixed
     */
    public function restore(Teacher $teacher, Module $module)
    {
        // Not required
    }

    /**
     * Determine whether the user can permanently delete the course.
     *
     * @param Teacher $teacher
     * @param  \App\Models\Module; $module
     * @return mixed
     */
    public function forceDelete(Teacher $teacher, Module $module)
    {
        // Not required
    }
}
