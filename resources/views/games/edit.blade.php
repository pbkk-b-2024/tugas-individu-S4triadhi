@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Game</h1>

    <form action="{{ route('games.update', $game) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Game Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $game->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Platform -->
        <div class="mb-4">
            <label for="platform" class="block text-sm font-medium text-gray-700">Platform</label>
            <input type="text" name="platform" id="platform" value="{{ old('platform', $game->platform) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Release Date -->
        <div class="mb-4">
            <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date', $game->release_date->format('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $game->description) }}</textarea>
        </div>

        <!-- Rating -->
        <div class="mb-4">
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
            <input type="text" name="rating" id="rating" value="{{ old('rating', $game->rating) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Developer -->
        <div class="mb-4">
            <label for="developer_id" class="block text-sm font-medium text-gray-700">Developer</label>
            <select name="developer_id" id="developer_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach($developers as $developer)
                    <option value="{{ $developer->id }}" {{ $game->developer_id == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Publisher -->
        <div class="mb-4">
            <label for="publisher_id" class="block text-sm font-medium text-gray-700">Publisher</label>
            <select name="publisher_id" id="publisher_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" {{ $game->publisher_id == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Categories -->
        <div class="mb-4">
            <label for="categories" class="block text-sm font-medium text-gray-700">Categories</label>
            <select name="categories[]" id="categories" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $game->categories->pluck('id')->contains($category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Consoles -->
        <div class="mb-4">
            <label for="consoles" class="block text-sm font-medium text-gray-700">Consoles</label>
            <select name="consoles[]" id="consoles" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" multiple>
                @foreach($consoles as $console)
                    <option value="{{ $console->id }}" {{ $game->gamePlatforms->pluck('console_id')->contains($console->id) ? 'selected' : '' }}>{{ $console->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Game</button>
        </div>
    </form>
</div>
@endsection
