<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'image'
    ];

    public function getUrl(){
        return '/'.env('PHOTO_UPLOAD_DIR','photo_upload')."/".$this->image;
    }

    public function getFileName(){
        return $this->image;
    }

    public function albums(){
        return $this->belongsToMany('App\Album');
    }


}
