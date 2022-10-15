<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        $pictures = Picture::with('album')->orderBy('id','desc')->paginate(5);
        return view('admin.albums.pictures.index', compact('pictures'));
    }

    public function create(){
        $albums = Album::get();
        return view('admin.albums.pictures.create' , compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','min:4','string'],
            'image'=>['required','max:1024','mimes:jpg,png,jpeg'],
            'album_id'=>['required','exists:albums,id']
        ]);
        $album = Album::find($request->album_id);
        $picture = Picture::create($request->post());
        $picture->addMediaFromRequest('image')->toMediaCollection('pictures');
        return redirect()->route('pictures.index')->with('success','picture has been created successfully.');


    }

    public function destroy(Picture $picture)
    {
        $picture->delete();
        return redirect()->route('pictures.index')->with('success','picture has been deleted successfully');
    }
}
