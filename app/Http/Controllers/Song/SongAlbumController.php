<?php

namespace App\Http\Controllers\Song;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\StoreSongAlbumRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;

class SongAlbumController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $album_id
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSongAlbumRequest $request, $song_id)
    {
        $validated = $request->validated();

        $song = Song::findOrFail($song_id);
        $album = Album::find($request->input('album'));
        $song->albums()->attach($album->id);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('songalbum', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('songs.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $album_id
     * @param  int  $song_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($song_id, $album_id)
    {
        $song = Song::findOrFail($song_id);
        $album = Album::findOrFail($album_id);
        $song->albums()->detach($album_id);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('songalbum', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('songs.index');
    }
}
