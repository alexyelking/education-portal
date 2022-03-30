<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestAnswer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'test_question_id', 'text', 'is_correct'
    ];

    public function taskBlock()
    {
        return $this->belongsTo('App\Models\TaskBlock', 'test_question_id', 'id');
    }
}
