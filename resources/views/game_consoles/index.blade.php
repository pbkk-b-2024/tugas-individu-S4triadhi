@extends('layouts.master')

@section('title', 'Game Consoles')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Game Consoles</h2>
    <a href="{{ route('game_consoles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Game Console</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">{{ session('success') }}</div>
    @endif

    <form action="{{ route('game_consoles.index') }}" method="GET" class="mb-4 flex">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search game consoles..." class="border p-2 w-full rounded-l" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Search</button>
    </form>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Manufacturer</th>
                <th class="py-2 px-4 border">Release Date</th>
                <th class="py-2 px-4 border">Generation</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gameConsoles as $gameConsole)
                <tr>
                    <td class="py-2 px-4 border">{{ $gameConsole->name }}</td>
                    <td class="py-2 px-4 border">{{ $gameConsole->manufacturer }}</td>
                    <td class="py-2 px-4 border">{{ $gameConsole->release_date }}</td>
                    <td class="py-2 px-4 border">{{ $gameConsole->generation }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('game_consoles.show', $gameConsole->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('game_consoles.edit', $gameConsole->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('game_consoles.destroy', $gameConsole->id) }}" method="POST" style="display:inline;">
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
            Showing {{ $gameConsoles->firstItem() }} to {{ $gameConsoles->lastItem() }} of {{ $gameConsoles->total() }} results
        </div>
        <div class="flex space-x-1">
            @if ($gameConsoles->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            @else
                <a href="{{ $gameConsoles->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            @endif

            @foreach ($gameConsoles->links()->elements[0] as $page => $url)
                @if ($gameConsoles->currentPage() == $page)
                    <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                @endif
            @endforeach

            @if ($gameConsoles->hasMorePages())
                <a href="{{ $gameConsoles->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            @endif
        </div>
    </div>
@endsection
