@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create Game Console</h1>

    <form action="{{ route('game_consoles.store') }}" method="POST">
        @csrf

        <!-- ID -->
        <div class="mb-4">
            <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
            <input type="text" name="id" id="id" value="{{ old('id') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Manufacturer -->
        <div class="mb-4">
            <label for="manufacturer" class="block text-sm font-medium text-gray-700">Manufacturer</label>
            <input type="text" name="manufacturer" id="manufacturer" value="{{ old('manufacturer') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Release Year -->
        <div class="mb-4">
            <label for="release_year" class="block text-sm font-medium text-gray-700">Release Year</label>
            <input type="number" name="release_year" id="release_year" value="{{ old('release_year') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Generation -->
        <div class="mb-4">
            <label for="generation" class="block text-sm font-medium text-gray-700">Generation</label>
            <input type="text" name="generation" id="generation" value="{{ old('generation') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Discontinued Date -->
        <div class="mb-4">
            <label for="discontinued_date" class="block text-sm font-medium text-gray-700">Discontinued Date</label>
            <input type="date" name="discontinued_date" id="discontinued_date" value="{{ old('discontinued_date') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create Console</button>
        </div>
    </form>
</div>
@endsection
