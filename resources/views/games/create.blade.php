@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create New Game</h1>

    <form action="{{ route('games.store') }}" method="POST">
        @csrf

        <!-- Game Title -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Release Date -->
        <div class="mb-4">
            <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
        </div>

        <!-- Rating -->
        <div class="mb-4">
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
            <input type="text" name="rating" id="rating" value="{{ old('rating') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Developer -->
        <div class="mb-4">
            <label for="developer_id" class="block text-sm font-medium text-gray-700">Developer</label>
            <select name="developer_id" id="developer_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach($developers as $developer)
                    <option value="{{ $developer->id }}" {{ old('developer_id') == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Publisher -->
        <div class="mb-4">
            <label for="publisher_id" class="block text-sm font-medium text-gray-700">Publisher</label>
            <select name="publisher_id" id="publisher_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Categories -->
        <div class="mb-4">
            <label for="categories" class="block text-sm font-medium text-gray-700">Categories</label>
            <select name="categories[]" id="categories" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Consoles -->
        <div class="mb-4">
            <label for="consoles" class="block text-sm font-medium text-gray-700">Consoles</label>
            <select name="consoles[]" id="consoles" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" multiple>
                @foreach($consoles as $console)
                    <option value="{{ $console->id }}" {{ in_array($console->id, old('consoles', [])) ? 'selected' : '' }}>{{ $console->name }}</option>
                @endforeach
            </select>            
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Game</button>
        </div>
    </form>
</div>
@endsection
