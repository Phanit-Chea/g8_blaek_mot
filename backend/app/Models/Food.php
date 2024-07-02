<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table = 'foods';

    protected $fillable = [
        'user_id',
        'name',
        'image_path',
        'video_url',
        'cooking_time',
        'nutrition',
        'ingredients',
    ];

    protected $casts = [
        'nutrition' => 'array',
        'ingredients' => 'array',
    ];

    /**
     * Define the relationship to the User model.
     */
    // Food.php


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    


    /**
     * Get all foods (consider renaming method to avoid conflicts).
     */
    // public static function allFoods()
    // {
    //     return self::all();
    // }

    /**
     * Store or update food data.
     */
    // public function store($requestData, $id = null)
    // {
    //     $data = $requestData->only(["user_id", "name", "image_path", "video_url", "cooking_time", "nutrition", "ingredients"]);
    //     return self::updateOrCreate(['id' => $id], $data);
    // }
}
