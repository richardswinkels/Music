@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="flex flex-col mt-2 sm:mt-0 sm:flex-row justify-center items-center sm:min-h-screen gap-5">
    <a class="bg-gray-200 rounded-md p-16 hover:bg-gray-300" href="{{ route('songs.index') }}">Songs</a>
    <a class="bg-gray-200 rounded-md p-16 hover:bg-gray-300" href="{{ route('bands.index') }}">Bands</a>
    <a class="bg-gray-200 rounded-md p-16 hover:bg-gray-300" href="{{ route('albums.index') }}">Albums</a>
</div>
@stop
