<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table ="upload_image";
    protected $fillable = ["file_name","file_path","number","comment-img-number","title"];
}
