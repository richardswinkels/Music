@extends('layouts.app')
@section('title', 'Songs')
@section('content')
@if(empty(request()->get('title')))
    <form method="POST" action="{{Route('songs.store')}}" class="flex flex-col w-1/2 mx-auto m-2">
    @csrf
    <div class="flex flex-col">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Titel:</label>
        <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="title" id="title" value="{{ old('title') }}"/>
        @error('title')
            <label class="text-red-600">{{ $message }}</label>
        @enderror
    </div>
    <div class="flex flex-col">
        <label class="block text-gray-700 text-sm font-bold my-2" for="singer">Artiest:</label>
        <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="singer" id="singer" value="{{ old('singer') }}"/>
        @error('singer')
        <label class="text-red-600">{{ $message }}</label>
        @enderror
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 my-3 rounded border-blue-200">Toevoegen</button>
    </div>
    </form>
    <form method="GET" action="{{Route('songs.create')}}" class="flex flex-col w-1/2 mx-auto m-2">
        <div class="flex flex-col">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Zoeken naar nummer:</label>
            <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="title" id="title"/>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 my-3 rounded border-blue-200">Zoeken</button>
        </div>
    </form>
@else
    @foreach($songsFromAPI as $song)
        <form method="POST" action="{{Route('songs.store')}}" class="flex flex-col w-1/2 mx-auto m-2">
        @csrf
            <input type="hidden" name="title" value="{{ $song['name'] }}"/>
            <input type="hidden" name="singer" value="{{ $song['artist'] }}"/>
            <div class="flex">
                <div class="flex-grow w-1/3">{{ $song['artist'] }} - {{ $song['name'] }}</div>
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>
    @endforeach
@endif
@stop
