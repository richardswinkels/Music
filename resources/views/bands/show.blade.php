@extends('layouts.app')
@section('title', 'Bands')
@section('content')
<div class="bg-gray-200 rounded-md m-2">
    <div class="p-2 border-b border-gray-600">
        <h1 class="text-black-200 text-3xl">{{ $band->name }}</h1>
    </div>
    <div class="p-2">
        <div>
            <div>Genre: {{ $band->genre }}</div>
        </div>
        <div>
            <div>Oprichtingsjaar: {{ $band->founded }}</div>
        </div>
        <div>
            <div>Actief tot: {{ $band->active_till }}</div>
        </div>
        @if($band->albums->isNotEmpty())
        <div>
            Albums:
            <ul class="list-disc ml-5">
            @foreach ($band->albums as $album)
                <li>{{ $album->name }}</li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
<a href="{{ route('bands.index') }}" class="inline-block bg-blue-500 text-white px-6 py-1.5 mx-2 rounded border-blue-200">Terug</a>
@stop