@extends('layouts.master')

@section('title', 'Game Creators')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Game Creators</h2>
    <a href="{{ route('game_creators.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Game Creator</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mt-2">{{ session('success') }}</div>
    @endif

    <form action="{{ route('game_creators.index') }}" method="GET" class="mb-4 flex">
        <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search game creators..." class="border p-2 w-full rounded-l" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Search</button>
    </form>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Video Game</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gameCreators as $gameCreator)
                <tr>
                    <td class="py-2 px-4 border">{{ $gameCreator->name }}</td>
                    <td class="py-2 px-4 border">{{ $gameCreator->videoGame->title }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('game_creators.show', $gameCreator->id) }}" class="text-blue-500 mr-2">Show</a>
                        <a href="{{ route('game_creators.edit', $gameCreator->id) }}" class="text-yellow-500 mr-2">Edit</a>
                        <form action="{{ route('game_creators.destroy', $gameCreator->id) }}" method="POST" style="display:inline;">
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
    <div class="mt-4">
        {{ $gameCreators->links() }}
    </div>
@endsection
