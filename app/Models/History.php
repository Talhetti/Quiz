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
}
