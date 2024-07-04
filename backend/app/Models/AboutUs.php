<?php

// app/Models/AboutUs.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'imageSlide',
        'imageDetail',
        'description',
        'recommentFood',
        'ourMission',
        'ourVision',
    ];

}


