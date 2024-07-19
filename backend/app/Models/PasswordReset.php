<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordReset extends Model
{
    use HasFactory;
    public $table = 'password_resets';
    public $timestamp = false;
    protected $primarykey = "email";
    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];
    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
