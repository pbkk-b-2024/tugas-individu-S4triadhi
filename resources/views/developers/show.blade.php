@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Developer Details</h1>

        <!-- Developer Details Card -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <h2 class="text-xl font-semibold">Name: {{ $developer->name }}</h2>
                <p class="text-gray-700">Founded Date: {{ $developer->founded_date}}</p>
                <p class="text-gray-700">Headquarters: {{ $developer->headquarters }}</p>
                <p class="text-gray-700">Website: 
                    <a href="{{ $developer->website }}" class="text-blue-500" target="_blank">{{ $developer->website }}</a>
                </p>
                <p class="text-gray-700">Description: {{ $developer->description }}</p>
            </div>

            <!-- Buttons to Go Back, Edit or Delete -->
            <div class="flex space-x-4">
                <a href="{{ route('developers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
                <a href="{{ route('developers.edit', $developer->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" type="submit" onclick="return confirm('Are you sure you want to delete this developer?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
