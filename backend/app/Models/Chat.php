<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'from_user',
        'to_user',
        'description',
        'image',
        'video',
        'active',
        'group_id'
    ];
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user');
    }

    // Optionally, define the toUser relationship if needed
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user');
    }

}
