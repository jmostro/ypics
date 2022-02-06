<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function index()
    {

        $albums = Album::latest()->paginate(8);                
        return view('albums.index', compact('albums'));
    }

    public function showAlbum(Album $album)
    {
        //$photos = $album->photos()->paginate(5);
        
        return view('albums.show', compact('album'));
    }


}
