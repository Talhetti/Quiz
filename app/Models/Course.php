<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name_course',
        'description',
        'quiz_count',
        'user_id',
        'image_url',
    ];

    public function quizzes()
    {
        return $this->hasMany(\App\Models\Quiz::class);
    }
}
