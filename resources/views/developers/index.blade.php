@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Developers</h1>

        <!-- Button to Create New Developer -->
        @can('create', App\Models\Developer::class)
            <div class="mb-4">
                <a href="{{ route('developers.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Add New Developer
                </a>
            </div>
        @endcan

        <!-- Search Form -->
        <form action="{{ route('developers.index') }}" method="GET" class="mb-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search by developer name"
                class="border rounded px-4 py-2"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>

        <!-- Developers Table -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">Name</th>
                    <th class="py-2 px-4 bg-gray-200">Founded Date</th>
                    <th class="py-2 px-4 bg-gray-200">Headquarters</th>
                    <th class="py-2 px-4 bg-gray-200">Website</th>
                    <th class="py-2 px-4 bg-gray-200">Description</th>
                    <th class="py-2 px-4 bg-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($developers as $developer)
                    <tr>
                        <td class="border px-4 py-2">{{ $developer->name }}</td>
                        <td class="border px-4 py-2">{{ $developer->founded_date }}</td>
                        <td class="border px-4 py-2">{{ $developer->headquarters }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ $developer->website }}" class="text-blue-500" target="_blank">{{ $developer->website }}</a>
                        </td>
                        <td class="border px-4 py-2">{{ $developer->description }}</td>
                        <td class="border px-4 py-2 flex space-x-2">
                            @can('view', $developer)
                                <a href="{{ route('developers.show', $developer->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                            @endcan
                            @can('update', $developer)
                                <a href="{{ route('developers.edit', $developer->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                            @endcan
                            @can('delete', $developer)
                                <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No developers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Showing {{ $developers->firstItem() }} to {{ $developers->lastItem() }} of {{ $developers->total() }} results
            </div>
            <div class="flex space-x-1">
                @if ($developers->onFirstPage())
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
                @else
                    <a href="{{ $developers->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
                @endif

                @foreach ($developers->links()->elements[0] as $page => $url)
                    @if ($developers->currentPage() == $page)
                        <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($developers->hasMorePages())
                    <a href="{{ $developers->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
                @else
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
                @endif
            </div>
        </div>

    </div>
@endsection
