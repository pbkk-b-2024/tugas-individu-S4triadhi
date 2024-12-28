@extends('layouts.master')

@section('title', 'Video Games')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Video Games</h2>
    <a href="{{ route('video_games.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Video Game</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">{{ session('success') }}</div>
    @endif

    <form action="{{ route('video_games.index') }}" method="GET" class="mb-4 flex">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search video games..." class="border p-2 w-full rounded-l" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Search</button>
    </form>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Title</th>
                <th class="py-2 px-4 border">Developer</th>
                <th class="py-2 px-4 border">Publisher</th>
                <th class="py-2 px-4 border">ESRB Rating</th>
                <th class="py-2 px-4 border">Genres</th>
                <th class="py-2 px-4 border">Release Date</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videoGames as $videoGame)
                <tr>
                    <td class="py-2 px-4 border">{{ $videoGame->title }}</td>
                    <td class="py-2 px-4 border">{{ $videoGame->developer->name }}</td>
                    <td class="py-2 px-4 border">{{ $videoGame->publisher->name }}</td>
                    <td class="py-2 px-4 border">{{ $videoGame->esrbRating->name }}</td>
                    <td class="py-2 px-4 border">
                        @foreach ($videoGame->genres as $genre)
                            {{ $genre->name }}@if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td class="py-2 px-4 border">{{ $videoGame->release_date }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('video_games.show', $videoGame->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('video_games.edit', $videoGame->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('video_games.destroy', $videoGame->id) }}" method="POST" style="display:inline;">
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
            Showing {{ $videoGames->firstItem() }} to {{ $videoGames->lastItem() }} of {{ $videoGames->total() }} results
        </div>
        <div class="flex space-x-1">
            @if ($videoGames->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">« Previous</span>
            @else
                <a href="{{ $videoGames->previousPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">« Previous</a>
            @endif

            @foreach ($videoGames->links()->elements[0] as $page => $url)
                @if ($videoGames->currentPage() == $page)
                    <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">{{ $page }}</a>
                @endif
            @endforeach

            @if ($videoGames->hasMorePages())
                <a href="{{ $videoGames->nextPageUrl() }}" class="px-4 py-2 bg-gray-100 text-gray-800 hover:bg-gray-200 rounded">Next »</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">Next »</span>
            @endif
        </div>
    </div>
@endsection
