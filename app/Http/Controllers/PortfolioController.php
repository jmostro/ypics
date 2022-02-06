<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;


class PortfolioController extends Controller
{
    public function indexAlbums($itemsPerPage = 8)
    {
        $albums = Album::latest()->paginate($itemsPerPage);                
        return view('albums.index', compact('albums'));
    }

    public function showAlbum(Album $album)
    {        
        return view('albums.show', compact('album'));
    }
}
