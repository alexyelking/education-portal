<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskBlock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'retries_count', 'position', 'cost', 'lesson_id'
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson', 'lesson_id', 'id');
    }
}
