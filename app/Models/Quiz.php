<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'topic',
        'course_id',
    ];

    // Um quiz pertence a um curso
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }

    // Um quiz tem muitas perguntas
    public function questions()
    {
        return $this->hasMany(\App\Models\Question::class);
    }

    // Um quiz pode ter muitos históricos
    public function histories()
    {
        return $this->hasMany(\App\Models\History::class);
    }
}
