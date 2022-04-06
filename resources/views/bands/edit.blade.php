@extends('layouts.app')
@section('title', 'Bands')
@section('content')
<form method="POST" action="{{Route('bands.update', $band->id)}}" class="flex flex-col w-1/2 mx-auto m-2">
@csrf
@method('PATCH')
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Naam:</label>
    <input class="shadow appearance-none border  border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="name" id="name" value="{{ old('name', $band->name) }}"/>
    @error('name')
        <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="genre">Genre:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="genre" id="genre" value="{{ old('genre', $band->genre) }}"/>
    @error('genre')
        <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="founded">Oprichtingsjaar:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="number" name="founded" id="founded" value="{{ old('founded', $band->founded) }}"/>    
    @error('founded')
    <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="active_till">Actief tot:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="active_till" id="active_till" value="{{ old('active_till', $band->active_till) }}"/>
    @error('active_till')
        <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div>
    <button type="submit" class="bg-blue-500 text-white px-6 py-2 my-3 rounded border-blue-200">Bewerken</button>
</div>
</form>
@stop