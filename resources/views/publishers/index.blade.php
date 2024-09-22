@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Publishers</h1>

        <!-- Button to Create New Publisher (only visible to Admins) -->
        @can('create', App\Models\Publisher::class)
            <div class="mb-4">
                <a href="{{ route('publishers.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Add New Publisher
                </a>
            </div>
        @endcan

        <!-- Search Form -->
        <form action="{{ route('publishers.index') }}" method="GET" class="mb-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search by publisher name"
                class="border rounded px-4 py-2"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>

        <!-- Publishers Table -->
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">Publisher Name</th>
                    <th class="py-2 px-4 bg-gray-200">Founded Date</th>
                    <th class="py-2 px-4 bg-gray-200">Headquarters</th>
                    <th class="py-2 px-4 bg-gray-200">Website</th>
                    <th class="py-2 px-4 bg-gray-200">Description</th>
                    <th class="py-2 px-4 bg-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($publishers as $publisher)
                    <tr>
                        <td class="border px-4 py-2">{{ $publisher->name }}</td>
                        <td class="border px-4 py-2">{{ $publisher->founded_date }}</td>
                        <td class="border px-4 py-2">{{ $publisher->headquarters }}</td>
                        <td class="border px-4 py-2">
                            @if($publisher->website)
                                <a href="{{ $publisher->website }}" class="text-blue-500 hover:underline" target="_blank">{{ $publisher->website }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ Str::limit($publisher->description, 50) }}</td>
                        <td class="border px-4 py-2">
                            <!-- View button, accessible to Admin, Writer, and Member roles -->
                            @can('view', $publisher)
                                <a href="{{ route('publishers.show', $publisher->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                            @endcan

                            <!-- Edit button, accessible to Admin and Writer roles -->
                            @can('update', $publisher)
                                <a href="{{ route('publishers.edit', $publisher->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                            @endcan

                            <!-- Delete button, accessible to Admins only -->
                            @can('delete', $publisher)
                                <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No publishers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing {{ $publishers->firstItem() }} to {{ $publishers->lastItem() }} of {{ $publishers->total() }} results
            </div>
            <div class="flex space-x-1">
                @if ($publishers->onFirstPage())
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
                @else
                    <a href="{{ $publishers->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
                @endif

                @foreach ($publishers->links()->elements[0] as $page => $url)
                    @if ($publishers->currentPage() == $page)
                        <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($publishers->hasMorePages())
                    <a href="{{ $publishers->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
                @else
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
                @endif
            </div>
        </div>
    </div>
@endsection
