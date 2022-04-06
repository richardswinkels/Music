@extends('layouts.app')
@section('title', 'Songs')
@section('content')
<div class="mb-4">
    @foreach ($songs as $song)
    <div class="flex items-center bg-gray-200 rounded-md p-2 m-2 flex-wrap">
        <div class="flex-grow w-1/3 py-2">{{ $song->title }}</div>
        <div class="flex">
            <a href="{{ route('songs.show', $song->id) }}" class="bg-blue-500 text-white px-6 py-1.5 rounded border-blue-200">Show</a>
            @auth
            <a href="{{ route('songs.edit', $song->id) }}" class="bg-yellow-300 text-white px-6 py-1.5 mx-2 rounded border-yellow-100">Edit</a>
            <form action="{{ route('songs.destroy', $song->id) }}" method="POST">
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
<a href="{{ route('songs.create') }}" class="bg-green-500 text-white px-6 py-2 mx-2 rounded border-green-300 border">Add</a>
@endauth
@stop