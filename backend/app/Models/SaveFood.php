<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveFood extends Model
{
    use HasFactory;
    protected $table = 'save_food';
    protected $fillable = [
        'user_id',
        'food_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
    public function savedFoods()
    {
        return $this->hasMany(SaveFood::class);
    }
}
