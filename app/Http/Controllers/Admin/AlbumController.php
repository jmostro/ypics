<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;

class AlbumController extends Controller
{
    public function index(){
        $albums = Album::all();          
        return view('admin.albums.index', compact('albums')); 
    }

    public function show(Album $album){
        return view('admin.albums.show', compact('album'));
    }

    public function edit(Album $album){
        return view('admin.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);      
        $input = $request->all();    
        $album->update($input);
        return redirect()->route('admin.albums.edit', $album->id)->with('success', 'Album actualizado correctamente.');
    }

    public function new(){
        return view('admin.albums.new');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);         
        $input = $request->all();        
        $album = new Album($input);
        $album->save(); 
        // todo attach images selected for album
        return redirect()->route('admin.albums.edit',$album->id)->with('success', 'Album creado correctamente.');
    }

    public function delete(Album $album){
        $album->delete();
        $albums = Album::all();
        return view('admin.albums.index', compact('albums'))->with('success', 'Album eliminado correctamente');
    }


    public function removePhoto(Album $album, Photo $photo){
        $album->photos()->detach($photo);
        return view('admin.albums.show', ['album'=>$album])->with('success', 'Foto quitada correctamente.');
     }
}
