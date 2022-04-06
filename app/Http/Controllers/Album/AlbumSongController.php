<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumSongRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumSongController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $album_id
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumSongRequest $request, $album_id)
    {
        $validated = $request->validated();
        $album = Album::findOrFail($album_id);
        $song = Song::find($request->input('song'));
        $album->songs()->attach($song->id);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('albumsong', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('albums.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $album_id
     * @param  int  $song_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($album_id, $song_id)
    {
        $album = Album::findOrFail($album_id);
        $song = Song::findOrFail($song_id);
        $album->songs()->detach($song_id);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('albumsong', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('albums.index');
    }
}
