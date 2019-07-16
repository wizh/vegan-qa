<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_text',
        'answers',
    ];

    protected $casts = [
        'answers' => 'array',
    ];
}
