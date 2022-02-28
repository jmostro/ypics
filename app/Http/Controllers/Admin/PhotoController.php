<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;
    
class PhotoController extends Controller
{
    public function index(){
        $photos = Photo::paginate();
        return view('admin.photos.index', compact('photos'));
    }
 
    public function new(){
        $albums  = Album::all();
        return view('admin.photos.new', compact('albums'));      
    }
 
    public function store(Request $request){
        $destinationPath = env('PHOTO_UPLOAD_DIR','photo_upload');            
        $input=$request->all();
        $uploadCount = 0;
        if($files = $request->file('images')){
            foreach($files as $file){
                $name = date('YmdHis') . "." . time().uniqid(rand()) . $file->getClientOriginalExtension();
                $file->move($destinationPath, $name);
                $photo = new Photo();
                $photo->image = $name;
                $photo->save();
                $uploadCount++;
            }
        }
        return redirect()->route('admin.photos.index')->with('success', 'Se agregaron '. $uploadCount. ' imágenes');
    }

    public function update(Request $request, Photo $photo){  
        $request->validate([]);
        $input = $request->only('title','description');        
        $photo->update($input);
        return response()->json(['success'=> 'Foto actualizada correctamente.']);
    }

    public function delete(Photo $photo){        
        $imageFile = public_path().$photo->getUrl();
        $photo->delete();
        // delete file
        if (file_exists($imageFile)) { 
            unlink($imageFile);
         }
        return response()->json(['success'=> 'Foto eliminada correctamente']);
    }
}