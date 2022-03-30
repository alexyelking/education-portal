<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'position', 'course_id'
    ];

    public function course(){
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }
}
