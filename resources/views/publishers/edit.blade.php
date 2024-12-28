@extends('layouts.master')

@section('title', 'Edit Publisher')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Publisher</h2>

    <!-- Back Button -->
    <a href="{{ route('publishers.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mb-4 inline-block">Back</a>

    <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block">Publisher Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" value="{{ $publisher->name }}" required>
        </div>
        <div class="mb-4">
            <label for="founded_year" class="block">Founded Year:</label>
            <input type="text" name="founded_year" id="founded_year" class="border p-2 w-full" value="{{ $publisher->founded_year }}">
        </div>
        <div class="mb-4">
            <label for="headquarters" class="block">Headquarters:</label>
            <input type="text" name="headquarters" id="headquarters" class="border p-2 w-full" value="{{ $publisher->headquarters }}">
        </div>
        <div class="mb-4">
            <label for="website" class="block">Website:</label>
            <input type="url" name="website" id="website" class="border p-2 w-full" value="{{ $publisher->website }}">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Publisher</button>
    </form>
@endsection
