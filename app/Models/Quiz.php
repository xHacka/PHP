<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = "quizzes_id";
    protected $fillable = [
        'title',
        'description',
        'is_active',
    ];
}
