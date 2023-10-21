<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artworks = artwork::all();
        return view('artworks.index', compact('artworks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $types = DB::table('artworks')->distinct()->get('art_type');
        // hoac dung cai nay
        $types = ['art', 'literature', 'music'];
        return view('artworks.add', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validateData = $request->validate([
            'artist_name' => 'required',
            'description' => 'required',
            'art_type' => 'required',
            'media_link' => 'required',
            'cover_image' => 'required',
        ]);

        // Create a new instance of Artwork model
        $artwork = new Artwork();

        // Set the values of the artwork properties from the request data
        $artwork->artist_name = $validateData['artist_name'];
        $artwork->description = $validateData['description'];
        $artwork->art_type = $validateData['art_type'];
        $artwork->media_link = $validateData['media_link'];
        $artwork->cover_image = $validateData['cover_image'];

        // Upload and set the cover image
      

        // Save the artwork to the database
        $artwork->save();
        Session::flash('success', 'Add New Artwork Successfully');
        return redirect()->route('artworks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork)
    {
        $artworks = artwork::all();
        return view('artworks.show', compact('artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {
        $types = DB::table('artworks')->distinct()->get('art_type');
        return view ('artworks.edit', compact('artwork', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validateData = $request->validate([
            'artist_name' => 'required',
            'description' => 'required',
            'art_type' => 'required',
            'media_link' => 'required',
            'cover_image' => 'required',
        ]);

        // Find the artwork by ID
        $artwork = Artwork::findOrFail($id);

        // Update the artwork properties from the request data
        $artwork->artist_name = $validateData['artist_name'];
        $artwork->description = $validateData['description'];
        $artwork->art_type = $validateData['art_type'];
        $artwork->media_link = $validateData['media_link'];
        $artwork->cover_image = $validateData['cover_image'];

        // Upload and update the cover image if provided

        // Save the updated artwork to the database
        $artwork->save();
        Session::flash('success', 'Artwork updated successfully');
        return redirect()->route('artworks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork)
    {
        $artwork->delete();
        return redirect()->route('artworks.index')->with('success', 'Artwork deleted successfully');
    }
}
