<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    //
    protected $fillable =  [
        'module_id', 'title',  'slug', 'excerpt', 'is_published', 'published_at', 'position'
    ];


    public function module()
    {
        // return $this->belongsTo(Course::class);
        return $this->belongsTo('App\Models\Module', 'module_id', 'id');
    }

}

