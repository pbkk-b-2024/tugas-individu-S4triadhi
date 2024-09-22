@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Add New Award</h1>

    <form action="{{ route('awards.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="border rounded px-4 py-2 w-full">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block text-gray-700">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category') }}" class="border rounded px-4 py-2 w-full">
            @error('category')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="year" class="block text-gray-700">Year</label>
            <input type="number" id="year" name="year" value="{{ old('year') }}" class="border rounded px-4 py-2 w-full">
            @error('year')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" name="description" class="border rounded px-4 py-2 w-full">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save Award</button>
    </form>
</div>
@endsection
