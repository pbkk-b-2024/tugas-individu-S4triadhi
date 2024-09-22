@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Publisher</h1>

        <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Publisher Name</label>
                <input type="text" name="name" id="name" class="border rounded px-4 py-2 w-full" value="{{ $publisher->name }}" required>
            </div>

            <div class="mb-4">
                <label for="founded_date" class="block text-gray-700">Founded Date</label>
                <input type="date" name="founded_date" id="founded_date" class="border rounded px-4 py-2 w-full" value="{{ $publisher->founded_date }}">
            </div>

            <div class="mb-4">
                <label for="headquarters" class="block text-gray-700">Headquarters</label>
                <input type="text" name="headquarters" id="headquarters" class="border rounded px-4 py-2 w-full" value="{{ $publisher->headquarters }}">
            </div>

            <div class="mb-4">
                <label for="website" class="block text-gray-700">Website</label>
                <input type="url" name="website" id="website" class="border rounded px-4 py-2 w-full" value="{{ $publisher->website }}">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="border rounded px-4 py-2 w-full">{{ $publisher->description }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Publisher</button>
            </div>
        </form>
    </div>
@endsection
