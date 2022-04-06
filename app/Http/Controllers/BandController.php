<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBandRequest;
use App\Http\Requests\UpdateBandRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Band;
use Carbon\Carbon;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('band', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('bands.index', ['bands' => $bands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('band', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBandRequest $request)
    {
        $validated = $request->validated();
        $name = $request->input('name');
        $genre = $request->input('genre');
        $founded = $request->input('founded');
        $active_till = $request->input('active_till');
        $band = Band::create(['name' => $name, 'genre' => $genre, 'founded' => $founded, 'active_till' => $active_till, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('band', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('bands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $band = Band::findOrFail($id);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('band', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('bands.show', ['band' => $band]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $band = Band::findOrFail($id);
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('band', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return view('bands.edit', ['band' => $band]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBandRequest $request, $id)
    {
        $validated = $request->validated();
        $band = Band::findOrFail($id);
        $band->name = $request->input('name');
        $band->genre = $request->input('genre');
        $band->founded = $request->input('founded');
        $band->active_till = $request->input('active_till');
        $band->updated_at = Carbon::now();
        $band->save();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('band', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('bands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $band = Band::findOrFail($id);
        $band->delete();
        $username = Auth::user() ? Auth::user()->name : 'Guest';
        Log::channel('music')->info('band', ['username' => $username, 'action' => Route::getCurrentRoute()->getActionMethod()]);
        return redirect()->route('bands.index');
    }
}
