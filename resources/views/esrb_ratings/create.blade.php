@extends('layouts.master')

@section('title', 'Create ESRB Rating')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create ESRB Rating</h2>

    <form action="{{ route('esrb_ratings.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="rating" class="block">Rating:</label>
            <input type="text" name="rating" id="rating" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block">Description:</label>
            <textarea name="description" id="description" class="border p-2 w-full" rows="4"></textarea>
        </div>
        <div class="flex space-x-2 mt-4"> <!-- Flex container for buttons -->
            <a href="{{ route('esrb_ratings.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">Back</a> <!-- Back button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create ESRB Rating</button> <!-- Create ESRB Rating button -->
        </div>
    </form>
@endsection
