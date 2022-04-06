<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Album;
use App\Models\Band;
use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('album', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('album', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        $validated = $request->validated();
        $name = $request->input('name');
        $year = $request->input('year');
        $times_sold = $request->input('times_sold');
        $album = Album::create(['name' => $name, 'year' => $year, 'times_sold' => $times_sold]);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('album', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Route::current()->get;
        Log::channel('music')->info('album', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('albums.show', ['album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $bands = Band::All();
        $songs = Song::All();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('album', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('albums.edit', ['album' => $album, 'bands' => $bands, 'songs' => $songs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, $id)
    {
        $validated = $request->validated();

        $album = Album::findOrFail($id);
        $band = Band::find($request->input('band'));
        $album->name = $request->input('name');
        $album->year = $request->input('year');
        $album->times_sold = $request->input('times_sold');
        $album->band()->associate($band);
        $album->save();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('album', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('album', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('albums.index');
    }
}
