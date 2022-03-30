<?php

namespace App\Policies;

use App\Course;
use App\Models\Teacher;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
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
    public function create(Teacher $teacher)
    {
        // This makes the middleware(auth:teacher) in the CourseController
    }

    /**
     * Determine whether the user can edit the course.
     *
     * @param User $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function edit(Teacher $teacher, Course $course)
    {
        return $teacher->id == $course->created_by;
    }

    /**
     * Determine whether the user can update the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function update(Teacher $teacher, Course $course)
    {
        return $teacher->id == $course->created_by;
    }

    /**
     * Determine whether the user can delete the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function destroy(Teacher $teacher, Course $course)
    {
        return $teacher->id == $course->created_by;
    }

    /**
     * Determine whether the user can restore the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function restore(Teacher $teacher, Course $course)
    {
        // Not required
    }

    /**
     * Determine whether the user can permanently delete the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function forceDelete(Teacher $teacher, Course $course)
    {
        // Not required
    }
}
