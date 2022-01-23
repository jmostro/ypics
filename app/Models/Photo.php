<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'image'
    ];

    public function getUrl(){
        return '/'.env('PHOTO_UPLOAD_DIR','photo_upload')."/".$this->image;
    }
}
