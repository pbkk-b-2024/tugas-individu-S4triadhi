@extends('layouts.master')

@section('title', 'Add Developer')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Add Developer</h2>

    <a href="{{ route('developers.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Back</a>

    <form action="{{ route('developers.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block">Developer Name:</label>
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
            <input type="text" name="website" id="website" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Developer</button>
    </form>
@endsection
