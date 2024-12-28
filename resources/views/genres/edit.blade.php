@extends('layouts.master')

@section('title', 'Edit Genre')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Genre: {{ $genre->name }}</h2>

    <!-- Back Button -->
    <a href="{{ route('genres.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Back</a>

    <!-- Genre Edit Form -->
    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block">Genre Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" value="{{ old('name', $genre->name) }}" required>
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block">Description:</label>
            <textarea name="description" id="description" class="border p-2 w-full">{{ old('description', $genre->description) }}</textarea>
            @error('description')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Genre</button>
    </form>
@endsection
