<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogapp extends Model
{
    use HasFactory;

    protected $table = "blogs";
    protected $fillable = ['title', 'contents', 'username'];
}
