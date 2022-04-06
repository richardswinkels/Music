@extends('layouts.app')
@section('title', 'Albums')
@section('content')
<div class="mb-4">
    @foreach ($albums as $album)
    <div class="flex items-center bg-gray-200 rounded-md p-2 m-2 flex-wrap">
        <div class="flex-grow w-1/3 py-2">{{ $album->name }}</div>
        <div class="flex">
            <a href="{{ route('albums.show', $album->id) }}" class="bg-blue-500 text-white px-6 py-1.5 rounded border-blue-200">Show</a>
            @auth
            <a href="{{ route('albums.edit', $album->id) }}" class="bg-yellow-300 text-white px-6 py-1.5 mx-2 rounded border-yellow-100">Edit</a>
            <form method="POST" action="{{ route('albums.destroy', $album->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-6 py-1.5 rounded border-red-300 border">Delete</button>
            </form>
            @endauth
        </div>
    </div>
    @endforeach
</div>
@auth
<a href="{{ route('albums.create') }}" class="bg-green-500 text-white px-6 py-2 mx-2 rounded border-green-300 border">Add</a>
@endauth
@stop