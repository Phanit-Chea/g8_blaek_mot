<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        "user_id", 
        "food_name",
        "upload_image",
        "video_url", 
        "cooking_time", 
        "ingredient", 
        "how_to_cook"
    ];
    public static function list(){
        return self::all();

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function store($request, $id = null)
    {
        $data = $request->only("user_id", "food_name","upload_image", "video_url",  "cooking_time","ingredient","how_to_cook");
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
