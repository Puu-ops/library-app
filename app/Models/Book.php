<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'author', 
        'description', 
        'category', // เพิ่มฟิลด์ category
        'image' // ฟิลด์ image
    ];
}
