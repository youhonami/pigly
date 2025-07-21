<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;

    // 必要に応じて fillable を定義（例）
    protected $fillable = [
        'user_id',
        'date',
        'weight',
        'calories',
        'exercise_time',
        'exercise_content',
    ];
}
