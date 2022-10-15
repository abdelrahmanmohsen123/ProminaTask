<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('id','desc')->paginate(5);
        return view('admin.albums.index', compact('albums'));
    }

    public function create(){
        return view('admin.albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','min:4','string']
        ]);
        
        Album::create($request->post());

        return redirect()->route('albums.index')->with('success','Album has been created successfully.');
    }

    public function edit(Album $album)
    {
        return view('admin.albums.edit',compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => ['required','min:4','string']
        ]);
        
        $album->fill($request->post())->save();

        return redirect()->route('albums.index')->with('success','Album Has Been updated successfully');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success','album has been deleted successfully');
    }
    
    // public function store(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'image'=>'required'
    //     ]);
    //     $album =Album::create($request->validate());
    //     $album->addMediaFromRequest('image')->toMediaCollection('albums');
    // }
}
