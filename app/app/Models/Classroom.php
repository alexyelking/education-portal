<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'teacher_id', 'name', 'slug'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'classroom_user', 'classroom_id', 'user_id');
    }

    public function invitedUsers()
    {
        return $this->belongsToMany('App\User', 'classroom_invites', 'classroom_id', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'classroom_course', 'classroom_id', 'course_id');
    }
}
