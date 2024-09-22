@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">{{ $game->title }}</h1>

    <div class="mb-4">
        <img src="{{ $game->cover_image }}" alt="{{ $game->title }}" class="w-full max-w-xs mb-4">
    </div>

    <div class="mb-4">
        <strong>Platform:</strong> {{ $game->platform }}
    </div>
    <div class="mb-4">
        <strong>Genre:</strong> {{ $game->genre }}
    </div>
    <div class="mb-4">
        <strong>Release Date:</strong> {{ $game->release_date->format('Y-m-d') }}
    </div>
    <div class="mb-4">
        <strong>Description:</strong>
        <p>{{ $game->description }}</p>
    </div>
    <div class="mb-4">
        <strong>Rating:</strong> {{ $game->rating }}
    </div>
    <div class="mb-4">
        <strong>Developer:</strong> {{ $game->developer->name }}
    </div>
    <div class="mb-4">
        <strong>Publisher:</strong> {{ $game->publisher->name }}
    </div>

    <div class="flex space-x-2">
        <a href="{{ route('games.edit', $game->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
        <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        <a href="{{ route('games.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
    </div>
</div>
@endsection
