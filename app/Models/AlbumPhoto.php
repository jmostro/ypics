<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
    use HasFactory;
    protected $table = "album_photo";
    protected $fillable = ["album_id", "photo_id"];

    public $timestamps = false
}
