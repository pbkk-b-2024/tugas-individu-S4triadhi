@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Games</h1>

    <!-- Button to Create New Game -->
    <div class="mb-4">
        @can('create', App\Models\Game::class)
            <a href="{{ route('games.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Add New Game
            </a>
        @endcan
    </div>

    <!-- Search Form -->
    <form action="{{ route('games.index') }}" method="GET" class="mb-4">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search games by title"
            class="border rounded px-4 py-2"
        >
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>

    <!-- Games Table -->
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200">Title</th>
                <th class="py-2 px-4 bg-gray-200">Console</th>
                <th class="py-2 px-4 bg-gray-200">Release Date</th>
                <th class="py-2 px-4 bg-gray-200">Description</th>
                <th class="py-2 px-4 bg-gray-200">Rating</th>
                <th class="py-2 px-4 bg-gray-200">Developer</th>
                <th class="py-2 px-4 bg-gray-200">Publisher</th>
                <th class="py-2 px-4 bg-gray-200">Categories</th>
                <th class="py-2 px-4 bg-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($games as $game)
                <tr>
                    <td class="border px-4 py-2">{{ $game->title }}</td>
                    <td class="border px-4 py-2">
                        @forelse ($game->gameConsole as $console)
                            <span class="block">{{ $console->name }}</span>
                        @empty
                            <span class="block">No consoles</span>
                        @endforelse
                    </td>                    
                    <td class="border px-4 py-2">{{ $game->release_date ? $game->release_date->format('Y-m-d') : 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ Str::limit($game->description, 50) }}</td>
                    <td class="border px-4 py-2">{{ $game->rating }}</td>
                    <td class="border px-4 py-2">{{ $game->developer->name ?? 'Unknown Developer' }}</td>
                    <td class="border px-4 py-2">{{ $game->publisher->name ?? 'Unknown Publisher' }}</td>
                    <td class="border px-4 py-2">
                        @foreach ($game->categories as $category)
                            <span class="block">{{ $category->name }}</span>
                        @endforeach
                    </td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('games.show', $game->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                        @can('update', $game)
                            <a href="{{ route('games.edit', $game->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                        @endcan
                        @can('delete', $game)
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4">No games found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    @if ($games->hasPages())
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing {{ $games->firstItem() }} to {{ $games->lastItem() }} of {{ $games->total() }} results
        </div>
        <div>
            {{ $games->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
