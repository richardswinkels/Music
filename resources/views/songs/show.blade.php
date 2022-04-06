@extends('layouts.app')
@section('title', 'Songs')
@section('content')
<div class="bg-gray-200 rounded-md m-2">
    <div class="p-2 border-b border-gray-600">
        <h1 class="text-black-200 text-3xl">{{ $song->title }}</h1>
    </div>
    <div class="p-2">
        <div>
            <div>Artiest: {{ $song->singer }}</div>
        </div>
        @if($song->albums->isNotEmpty())
        <div>
            Albums:
            <ul class="list-disc ml-5">
            @foreach ($song->albums as $album)
                <li>{{ $album->name }}</li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
<a href="{{ route('songs.index') }}" class="inline-block bg-blue-500 text-white px-6 py-1.5 mx-2 rounded border-blue-200">Terug</a>
@stop