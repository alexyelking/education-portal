<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestQuestion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'task_block_id', 'text', 'correct_count', 'wrong_count', 'image_link'
    ];

    public function taskBlock()
    {
        return $this->belongsTo('App\Models\TaskBlock', 'task_block_id', 'id');
    }
}
