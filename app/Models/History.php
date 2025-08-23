<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score_obtained',
        'completed_at',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(\App\Models\Quiz::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
