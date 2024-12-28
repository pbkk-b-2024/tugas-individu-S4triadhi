@extends('layouts.master')

@section('title', 'Create Game Console')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create Game Console</h2>

    <a href="{{ route('game_consoles.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Back</a>

    <form action="{{ route('game_consoles.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block">Console Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="manufacturer" class="block">Manufacturer:</label>
            <input type="text" name="manufacturer" id="manufacturer" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="release_date" class="block">Release Date:</label>
            <input type="date" name="release_date" id="release_date" class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label for="generation" class="block">Generation:</label>
            <input type="text" name="generation" id="generation" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Game Console</button>
    </form>
@endsection
