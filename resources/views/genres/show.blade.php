@extends('layouts.master')

@section('title', 'View Genre')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Genre Details: {{ $genre->name }}</h2>

    <!-- Back Button -->
    <a href="{{ route('genres.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Back</a>

    <!-- Genre Details -->
    <div class="mb-4">
        <strong>Name:</strong> {{ $genre->name }}
    </div>

    <div class="mb-4">
        <strong>Description:</strong> {{ $genre->description ?? 'No description available' }}
    </div>

    <!-- Edit and Delete Buttons -->
    <a href="{{ route('genres.edit', $genre->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>

    <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
    </form>
@endsection
