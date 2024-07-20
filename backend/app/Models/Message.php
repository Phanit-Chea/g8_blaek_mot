<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'from_user_id', 'description','image','video'];

    public function user()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
