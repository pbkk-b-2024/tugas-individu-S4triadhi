@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Game Consoles</h1>

    <!-- Button to Create New Game Console -->
    <div class="mb-4">
        @can('create', App\Models\GameConsole::class)
            <a href="{{ route('game_consoles.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Add New Console
            </a>
        @endcan
    </div>

    <!-- Search Form -->
    <form action="{{ route('game_consoles.index') }}" method="GET" class="mb-4">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search by name or manufacturer"
            class="border rounded px-4 py-2"
        >
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>

    <!-- Game Consoles Table -->
    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200">Name</th>
                <th class="py-2 px-4 bg-gray-200">Manufacturer</th>
                <th class="py-2 px-4 bg-gray-200">Release Year</th>
                <th class="py-2 px-4 bg-gray-200">Generation</th>
                <th class="py-2 px-4 bg-gray-200">Discontinued Date</th>
                <th class="py-2 px-4 bg-gray-200">Description</th>
                <th class="py-2 px-4 bg-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($consoles as $console)
                <tr>
                    <td class="border px-4 py-2">{{ $console->name }}</td>
                    <td class="border px-4 py-2">{{ $console->manufacturer }}</td>
                    <td class="border px-4 py-2">{{ $console->release_year }}</td>
                    <td class="border px-4 py-2">{{ $console->generation }}</td>
                    <td class="border px-4 py-2">{{ $console->discontinued_date }}</td>
                    <td class="border px-4 py-2">{{ Str::limit($console->description, 50) }}</td>
                    <td class="border px-4 py-2">
                        <!-- View Button - Accessible to Admin, Writer, and Member -->
                        @can('view', $console)
                            <a href="{{ route('game_consoles.show', $console->id) }}" class="bg-blue-500 text-white px-2 py-1">View</a>
                        @endcan

                        <!-- Edit Button - Accessible to Admin and Writer -->
                        @can('update', $console)
                            <a href="{{ route('game_consoles.edit', $console->id) }}" class="bg-yellow-500 text-white px-2 py-1">Edit</a>
                        @endcan

                        <!-- Delete Button - Accessible only to Admin -->
                        @can('delete', $console)
                            <form action="{{ route('game_consoles.destroy', $console->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">No game consoles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing {{ $consoles->firstItem() }} to {{ $consoles->lastItem() }} of {{ $consoles->total() }} results
        </div>
        <div class="flex space-x-1">
            @if ($consoles->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            @else
                <a href="{{ $consoles->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            @endif

            @foreach ($consoles->links()->elements[0] as $page => $url)
                @if ($consoles->currentPage() == $page)
                    <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                @endif
            @endforeach

            @if ($consoles->hasMorePages())
                <a href="{{ $consoles->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            @endif
        </div>
    </div>
</div>
@endsection
