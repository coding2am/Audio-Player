<?php

namespace App\Http\Controllers;

use App\Songs;
use App\SongTypes;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Songs::all();
        return view('backend.song.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songTypes = SongTypes::all();
        return view('backend.song.create', compact('songTypes'));
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
            "title" => "required|min:2",
            "songTypes" => "required",
            "file" => "required|mimes:mpeg,mpga,mp3,wav"
        ]);

        $song = new Songs();
        $song->title = $request->title;
        $song->song_type_id = $request->songTypes;

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('tracks', $fileName, 'public');
            $path = "storage/" . $filePath;
        }

        $song->path = $path;
        $song->save();

        return redirect()->route('songs.index')->with('success', 'Track has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Songs::find($id);
        unlink(public_path($song->path));
        $song->delete();
        return redirect()->route('songs.index')->with("success", "Successfully Deleted");
    }
}
