<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use Database\Seeders\SongsTableSeeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Song;
use Carbon\Carbon;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $songs = Song::all();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('song', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Maakt lege array
        $songsFromAPI = [];

        //Als request een querystring voor parameter title bevat
        if ($request->query->has('title') && !empty($request->query->get('title'))) {

            //Variabele voor de API-key
            $api_key = '';

            //Haal de waarde van querystring voor parameter title op en zet deze in $title
            $title = $request->query('title');

            //Doe een GET request om de data van de API op te vragen en zet deze in $response
            $response = Http::get(
                'http://ws.audioscrobbler.com/2.0/?method=track.search&track=' .
                    $title . '&api_key=' . $api_key . '&format=json'
            )->json();

            //Zet alle nummers in $songsFromAPI
            $songsFromAPI = $response["results"]["trackmatches"]["track"];
        }

        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('song', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('songs.create', ['songsFromAPI' => $songsFromAPI]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSongRequest $request)
    {
        $validated = $request->validated();
        $title = $request->input('title');
        $singer = $request->input('singer');
        $song = Song::create(['title' => $title, 'singer' => $singer, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('song', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route("songs.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('song', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('songs.show', ['song' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        $albums = Album::All();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('song', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('songs.edit', ['song' => $song, 'albums' => $albums]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSongRequest $request, $id)
    {
        $validated = $request->validated();
        $song = Song::findOrFail($id);
        $song->title = $request->input('title');
        $song->singer = $request->input('singer');
        $song->updated_at = Carbon::now();
        $song->save();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('song', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('song', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('songs.index');
    }
}
