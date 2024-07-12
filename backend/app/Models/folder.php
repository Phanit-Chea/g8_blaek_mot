<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Folder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id", 
        "folder_name",
    ];

    public static function list()
    {
        return self::all();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function store($request, $id = null)
    {
        $data = $request->only("user_id", "folder_name");
        $folder = self::updateOrCreate(['id' => $id], $data);
        return $folder;
    }
}
