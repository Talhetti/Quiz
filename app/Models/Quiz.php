<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'question',
        'option',
        'correct_answer',
        'topic',
        'score',
        'courses_id'
    ];
}
