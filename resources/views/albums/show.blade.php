@extends('layouts.app')
@section('title', 'Albums')
@section('content')
<div class="bg-gray-200 rounded-md m-2">
    <div class="p-2 border-b border-gray-600">
        <h1 class="text-black-200 text-3xl">{{ $album->name }}</h1>
    </div>
    <div class="p-2">
        @if(!is_null($album->band))
        <div>
            <div>Band: {{ $album->band->name }}</div>
        </div>
        @endif
        @if(!is_null($album->year))
        <div>
            <div>Verschijningsjaar: {{ $album->year }}</div>
        </div>
        @endif
        @if(!is_null($album->times_sold))
        <div>
            <div>Aantal keer verkocht: {{ $album->times_sold }}</div>
        </div>
        @endif
        @if($album->songs->isNotEmpty())
        <div>
            Nummers:
            <ul class="list-disc ml-5">
            @foreach ($album->songs as $song)
                <li>{{ $song->title }}</li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
<a href="{{ route('albums.index') }}" class="inline-block bg-blue-500 text-white px-6 py-1.5 mx-2 rounded border-blue-200">Terug</a>
@stop