@extends('layouts.master')

@section('title', 'Create Publisher')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create Publisher</h2>

    <form action="{{ route('publishers.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Publisher Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="founded_year" class="block">Founded Year:</label>
            <input type="text" name="founded_year" id="founded_year" class="border p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="headquarters" class="block">Headquarters:</label>
            <input type="text" name="headquarters" id="headquarters" class="border p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="website" class="block">Website:</label>
            <input type="url" name="website" id="website" class="border p-2 w-full">
        </div>

        <!-- Flex container for buttons -->
        <div class="flex space-x-2 mt-4">
            <a href="{{ route('publishers.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">Back</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Publisher</button>
        </div>
    </form>
@endsection
