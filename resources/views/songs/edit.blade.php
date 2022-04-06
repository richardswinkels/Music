@extends('layouts.app')
@section('title', 'Songs')
@section('content')
<form action="{{ route('songs.update', $song->id) }}" method="POST" class="flex flex-col w-1/2 mx-auto m-2">
@csrf
@method('PATCH')
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Titel:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="title" id="title" value="{{ old('title', $song->title) }}" />
    @error('title')
        <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="singer">Artiest:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="singer" id="singer" value="{{ old('singer', $song->singer) }}" />    
    @error('singer')
        <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div>
    <button type="submit" class="bg-blue-500 text-white px-6 py-2 my-3 rounded border-blue-200">Bewerken</button>
</div>
</form>
@if($song->albums->isNotEmpty())
<div class="bt-2 w-1/2 mx-auto my-2">
    <h1 class="text-2xl font-semibold">Albums:</h1>
    @foreach ($song->albums as $album)
        <div class="flex">
            <div class="flex-grow w-1/3">{{ $album->name }}</div>
            <div>
                <form method="POST" action="{{ route('songalbum.destroy', [$song->id, $album->id]) }}">
                @csrf
                @method('DELETE')
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endif
<form class="w-1/2 mx-auto" method="POST" action="{{ route('songalbum.store', $song->id) }}">
@csrf
    <div class="flex flex-col">
        <label class="block text-gray-700 text-sm font-bold my-2" for="album">Album:</label>
        <select name="album" class="shadow border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
        @foreach ($albums as $album)
            <option value="{{ $album->id }}">{{ $album->name }}</option>
        @endforeach
        </select>
        @error('album')
            <label class="text-red-600">{{ $message }}</label>
        @enderror
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 my-3 rounded border-blue-200">Toevoegen</button>
    </div>
</form>
@stop