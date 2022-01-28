<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;
use App\Models\AlbumPhoto;

class Album extends Model
{
    use HasFactory;    
    protected $fillable = [
        'title', 'description', 'cover'
    ];

    public function getCoverUrl(){
        return '/'.env('PHOTO_UPLOAD_DIR','photo_upload')."/".$this->cover;
    }

    public function photos(){
        return $this->belongsToMany(Photo::class,'album_photo', 'album_id', 'photo_id');
    }
}
