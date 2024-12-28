@extends('layouts.master')

@section('title', 'ESRB Rating Details')

@section('content')
    <h2 class="text-2xl font-bold mb-4">ESRB Rating: {{ $esrb_rating->rating }}</h2>

    <div class="mb-4">
        <strong>Description:</strong>
        <p>{{ $esrb_rating->description ?? 'No description available' }}</p>
    </div>

    <div class="flex space-x-2">
        <a href="{{ route('esrb_ratings.edit', $esrb_rating) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>

        <form action="{{ route('esrb_ratings.destroy', $esrb_rating) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
        </form>

        <a href="{{ route('esrb_ratings.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Back to List</a>
    </div>
@endsection
