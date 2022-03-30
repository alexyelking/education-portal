<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property mixed created_by
 */
class Course extends Model
{
    // Mass assigned
    protected $fillable = ['title', 'slug', 'description_short', 'description', 'tags', 'image', 'video', 'created_by', 'cost'];

    // Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($this->id . rand(100, 999) . mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'created_by', 'id');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'course_id');
    }

    public function classrooms()
    {
        return $this->belongsToMany('App\Models\Classroom', 'classroom_course', 'course_id', 'classroom_id');
    }
}
