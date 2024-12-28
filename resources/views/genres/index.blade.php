@extends('layouts.master')

@section('title', 'Genre List')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Genre List</h2>

    <!-- Button to create a new genre -->
    <a href="{{ route('genres.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Genre</a>

    <!-- Display success message if exists -->
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('genres.index') }}" method="GET" class="mb-4 flex">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search genres..." class="border p-2 w-full rounded-l" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Search</button>
    </form>

    <!-- Genres Table -->
    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Description</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td class="py-2 px-4 border">{{ $genre->name }}</td>
                    <td class="py-2 px-4 border">{{ $genre->description ?? 'No description' }}</td>
                    <td class="py-2 px-4 border">
                        <!-- View, Edit, Delete buttons -->
                        <a href="{{ route('genres.show', $genre->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('genres.edit', $genre->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing {{ $genres->firstItem() }} to {{ $genres->lastItem() }} of {{ $genres->total() }} results
        </div>
        <div class="flex space-x-1">
            {{ $genres->links() }}
        </div>
    </div>
@endsection
