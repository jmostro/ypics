<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function albums(){
        $albums = Album::all();          
        return view('admin.albums.index', compact('albums')); 
    }

    public function showAlbum(Album $album){
        return view('admin.albums.show', compact('album'));
    }

    public function editAlbum(Album $album){
        return view('admin.albums.edit', compact('album'));
    }

    public function updateAlbum(Request $request, Album $album){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);      
        $input = $request->all();    
        $album->update($input);
        return redirect()->route('admin.albums.edit', $album->id)->with('success', 'Album actualizado correctamente.');
    }

    public function newAlbum(){
        return view('admin.albums.new');
    }

    public function storeAlbum(Request $request){
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

    public function deleteAlbum(Album $album){
        $album->delete();
        $albums = Album::all();
        return view('admin.albums.index', compact('albums'))->with('success', 'Album eliminado correctamente');
    }

    public function photos(){
        $photos = Photo::paginate();
        return view('admin.photos.index', compact('photos'));
    }
    
    public function removePhotoFromAlbum(Album $album, Photo $photo){
       $album->photos()->detach($photo);
       return view('admin.albums.show', ['album'=>$album])->with('success', 'Foto quitada correctamente.');
    }

    public function newPhoto(){
        $albums  = Album::all();
        return view('admin.photos.new', compact('albums'));      
    }
 
    public function storePhoto(Request $request){       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);          
        if ($image = $request->file('image')) {
            $input = $request->all();        
            $destinationPath = env('PHOTO_UPLOAD_DIR','uploads');            
            // save new file
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
            $photo = new Photo($input);
            $photo->save();            
            if (isset($input['albums'])){
                $photo->albums()->sync($input['albums']);
            } else {
                $photo->albums()->detach();
            }                        
        } else {
            unset($input['image']);
        }        
        return redirect()->route('admin.photos.edit',$photo->id)->with('success', 'Foto agregada correctamente.');
    }

    public function editPhoto(Photo $photo){
        $albums  = Album::all();
        return view('admin.photos.edit', compact('photo','albums'));
    }

    public function updatePhoto(Request $request, Photo $photo){
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
      
        $input = $request->all();        
        if ($image = $request->file('image')) {
            $destinationPath = env('PHOTO_UPLOAD_DIR','uploads');            
            // delete previous file
            $oldImageFile = public_path().$photo->getUrl();
            if (file_exists($oldImageFile)) { 
                unlink($oldImageFile);
             }
            // save new file
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }
        if (isset($input['albums'])){
            $photo->albums()->sync($input['albums']);
        } else {
            $photo->albums()->detach();
        }        
        return redirect()->route('admin.photos.edit', $photo->id)->with('success', 'Foto actualizada correctamente.');
    }

    public function deletePhoto(Photo $photo){        
        $imageFile = public_path().$photo->getUrl();
        $photo->delete();
        // delete file
        if (file_exists($imageFile)) { 
            unlink($imageFile);
         }
        $photos = Photo::all();
        return view('admin.photos.index', compact('photos'))->with('success', 'Foto eliminada correctamente');
    }
}