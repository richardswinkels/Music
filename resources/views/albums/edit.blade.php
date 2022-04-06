@extends('layouts.app')
@section('title', 'Albums')
@section('content')
<form method="POST" action="{{Route('albums.update', $album->id)}}" class="flex flex-col w-1/2 mx-auto m-2">
@csrf
@method('PATCH')
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Naam:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="name" id="name" value="{{ old('name', $album->name) }}"/>
    @error('name')
        <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="year">Verschijningsjaar:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="number" name="year" id="year" value="{{ old('year', $album->year) }}"/>    
    @error('year')
    <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="times_sold">Aantal keer verkocht:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="number" name="times_sold" id="times_sold" value="{{ old('times_sold', $album->times_sold) }}"/>    
    @error('times_sold')
    <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="band">Band:</label>
    <select name="band" class="shadow border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" selec>
        <option></option>
    @foreach ($bands as $band)
        <option value="{{ $band->id }}" @if($band == $album->band) selected @endif>{{ $band->name}}</option>
    @endforeach
    </select>
</div>
<div>
    <button type="submit" class="bg-blue-500 text-white px-6 py-2 my-3 rounded border-blue-200">Bewerken</button>
</div>
</form>
@if($album->songs->isNotEmpty())
<div class="bt-2 w-1/2 mx-auto my-2">
    <h1 class="text-2xl font-semibold">Nummers:</h1>
    @foreach ($album->songs as $song)
        <div class="flex">
            <div class="flex-grow w-1/3">{{ $song->title }}</div>
            <div>
                <form method="POST" action="{{ route('albumsong.destroy', [$album->id, $song->id]) }}">
                @csrf
                @method('DELETE')
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endif
<form class="w-1/2 mx-auto" method="POST" action="{{ route('albumsong.store', $album->id) }}">
@csrf
    <div class="flex flex-col">
        <label class="block text-gray-700 text-sm font-bold my-2" for="song">Nummer:</label>
        <select name="song" class="shadow border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
        @foreach ($songs as $song)
            <option value="{{ $song->id }}">{{ $song->title }}</option>
        @endforeach
        </select>
        @error('song')
            <label class="text-red-600">{{ $message }}</label>
        @enderror
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 my-3 rounded border-blue-200">Toevoegen</button>
    </div>
</form>
@stop