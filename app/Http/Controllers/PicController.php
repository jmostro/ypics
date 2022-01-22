<?php

namespace App\Http\Controllers;
use App\Models\Pic;
use Illuminate\Http\Request;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pics = Pic::latest()->paginate(5);
        return view('pics.index', compact('pics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Pic::create($input);
        return redirect()->route('pics.index')
            ->with('success', 'Imagen creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function show(Pic $pic)
    {
        return view('pics.show', compact('pic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function edit(pic $pic)
    {
        return view('pics.edit', compact('pic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pic $pic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pic $pic)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'pics/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $pic->update($input);
        return redirect()->route('pics.index')
            ->with('success', 'Imagen actualizada correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pic $pic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pic $pic)
    {
        $pic->delete();
        return redirect()->route('pics.index')
            ->with('success', 'Imagen eliminada correctamente.');
    }
}
