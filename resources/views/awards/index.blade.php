@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Awards</h1>

    <!-- Button to Create New Award -->
    <div class="mb-4">
        @can('create', App\Models\Award::class)
            <a href="{{ route('awards.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Add New Award
            </a>
        @endcan
    </div>

    <!-- Search Form -->
    <form action="{{ route('awards.index') }}" method="GET" class="mb-4">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search by award name"
            class="border rounded px-4 py-2"
        >
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>

    <!-- Awards Table -->
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200">Name</th>
                <th class="py-2 px-4 bg-gray-200">Category</th>
                <th class="py-2 px-4 bg-gray-200">Year</th>
                <th class="py-2 px-4 bg-gray-200">Description</th>
                <th class="py-2 px-4 bg-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($awards as $award)
                <tr>
                    <td class="border px-4 py-2">{{ $award->name }}</td>
                    <td class="border px-4 py-2">{{ $award->category }}</td>
                    <td class="border px-4 py-2">{{ $award->year }}</td>
                    <td class="border px-4 py-2">{{ Str::limit($award->description, 50) }}</td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('awards.show', $award->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                        @can('update', $award)
                            <a href="{{ route('awards.edit', $award->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                        @endcan
                        @can('delete', $award)
                            <form action="{{ route('awards.destroy', $award->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No awards found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing {{ $awards->firstItem() }} to {{ $awards->lastItem() }} of {{ $awards->total() }} results
        </div>
        <div class="flex space-x-1">
            @if ($awards->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            @else
                <a href="{{ $awards->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            @endif

            @foreach ($awards->links()->elements[0] as $page => $url)
                @if ($awards->currentPage() == $page)
                    <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                @endif
            @endforeach

            @if ($awards->hasMorePages())
                <a href="{{ $awards->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            @endif
        </div>
    </div>
</div>
@endsection
