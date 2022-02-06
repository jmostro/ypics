<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
   
    public function index()
    {        
        $photos = Photo::latest()->paginate(8);
        return view('photos.index', compact('photos')); //->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('photos.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = env('PHOTO_UPLOAD_DIR','uploads');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        Photo::create($input);
        return redirect()->route('photos.index')->with('success', 'Imagen creada correctamente.');
    }

  
    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

   
    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

  
    public function update(Request $request, Photo $photo)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = env('PHOTO_UPLOAD_DIR','uploads');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }
        $photo->update($input);
        return redirect()->route('photos.index')->with('success', 'Imagen actualizada correctamente.');
    }
  
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index')
            ->with('success', 'Imagen eliminada correctamente.');
    }
}
