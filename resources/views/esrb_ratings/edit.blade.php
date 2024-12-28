@extends('layouts.master')

@section('title', 'Edit ESRB Rating')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit ESRB Rating: {{ $esrb_rating->rating }}</h2>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('esrb_ratings.update', $esrb_rating) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT for updating -->

        <div class="mb-4">
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
            <input type="text" name="rating" id="rating" value="{{ old('rating', $esrb_rating->rating) }}" required class="border p-2 w-full rounded" />
            @error('rating')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="border p-2 w-full rounded">{{ old('description', $esrb_rating->description) }}</textarea>
            @error('description')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update ESRB Rating</button>
        <a href="{{ route('esrb_ratings.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded ml-2">Cancel</a>
    </form>
@endsection
