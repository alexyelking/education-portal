<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassroomInvite extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'classroom_id', 'message_title', 'title_slug', 'message_text',
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Course', 'classroom_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
