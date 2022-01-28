<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums  = Album::all();
        $albums->each(function ($album){
           $photos = Photo::factory()->count(3)->create();
           $album->cover = $photos->first->image->image;                      
           $album->photos()->attach($photos);
           /*
           $photos->each(function ($photo) use ($album){
               $album->photos()->attach($photo);
           });
           */
           $album->save();
        });
      
    }
}


