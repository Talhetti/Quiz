<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // Uma pergunta pertence a um quiz
    public function quiz()
    {
        return $this->belongsTo(\App\Models\Quiz::class);
    }
}