<?php

namespace App\Policies;

use App\User;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassroomPolicy
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
    public function view(Teacher $teacher)
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
    public function edit(Teacher $teacher, Classroom $classroom)
    {
        return $teacher->id == $classroom->teacher_id;
    }

    /**
     * Determine whether the user can update the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function update(Teacher $teacher, Classroom $classroom)
    {
        return $teacher->id == $classroom->teacher_id;
    }

    /**
     * Determine whether the user can delete the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function destroy(Teacher $teacher, Classroom $classroom)
    {
        return $teacher->id == $classroom->teacher_id;
    }

    /**
     * Determine whether the user can restore the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function restore(Teacher $teacher, Classroom $classroom)
    {
        return $teacher->id == $classroom->teacher_id;
    }

    /**
     * Determine whether the user can permanently delete the course.
     *
     * @param Teacher $teacher
     * @param  \App\Course $course
     * @return mixed
     */
    public function forceDelete(Teacher $teacher, Classroom $classroom)
    {
        return $teacher->id == $classroom->teacher_id;
    }
}
