<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'image',
        'video_url',
        'cooking_time',
        'nutrition',
        'ingredients',
    ];
}
