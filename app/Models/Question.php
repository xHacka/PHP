<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model {
    use HasFactory;

    protected $fillable = [
        'question', 
        'image', 
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'answer', 
        'correct_answer', 
        'quiz_id'
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
