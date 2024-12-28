@extends('layouts.master')

@section('title', 'Game Creator Details')

@section('content')
    <div class="mb-4"> <!-- Added margin-bottom to the entire content -->
        <h2 class="text-2xl font-bold mb-4">{{ $gameCreator->name }}</h2>

        <p class="mb-2"><strong>Bio:</strong> {{ $gameCreator->bio }}</p>
        <p class="mb-2"><strong>Video Game:</strong> {{ $gameCreator->videoGame->title }}</p>

        <div class="mt-4">
            <a href="{{ route('game_creators.edit', $gameCreator->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
            <form action="{{ route('game_creators.destroy', $gameCreator->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            </form>
            <a href="{{ route('game_creators.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to List</a>
        </div>
    </div>
@endsection
