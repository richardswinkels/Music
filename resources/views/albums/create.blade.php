@extends('layouts.app')
@section('title', 'Albums')
@section('content')
<form method="POST" action="{{Route('albums.store')}}" class="flex flex-col w-1/2 mx-auto m-2">
@csrf
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Naam:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="text" name="name" id="name" value="{{ old('name') }}"/>
    @error('name')
        <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="year">Verschijningsjaar:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="number" name="year" id="year" value="{{ old('year') }}"/>    
    @error('year')
    <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div class="flex flex-col">
    <label class="block text-gray-700 text-sm font-bold my-2" for="times_sold">Aantal keer verkocht:</label>
    <input class="shadow appearance-none border border-gray-300 rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" type="number" name="times_sold" id="times_sold" value="{{ old('times_sold') }}"/>    
    @error('times_sold')
    <label class="text-red-600">{{ $message }}</label>
    @enderror
</div>
<div>
    <button type="submit" class="bg-blue-500 text-white px-6 py-2 my-3 rounded border-blue-200">Toevoegen</button>
</div>
</form>
@stop