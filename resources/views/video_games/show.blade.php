@extends('layouts.master')

@section('title', 'Video Game Details')

@section('content')
    <h2 class="text-2xl font-bold mb-4">{{ $videoGame->title }}</h2>

    <p class="mb-4"><strong>Description:</strong> {{ $videoGame->description }}</p>
    <p class="mb-4"><strong>Developer:</strong> {{ $videoGame->developer->name }}</p>
    <p class="mb-4"><strong>Publisher:</strong> {{ $videoGame->publisher->name }}</p>
    <p class="mb-4"><strong>ESRB Rating:</strong> {{ $videoGame->esrbRating->name }}</p>
    <p class="mb-4"><strong>Genres:</strong>
        @foreach ($videoGame->genres as $genre)
            {{ $genre->name }}@if(!$loop->last), @endif
        @endforeach
    </p>
    <p class="mb-4"><strong>Console:</strong> {{ $videoGame->console_id ? $videoGame->console->name : 'N/A' }}</p>
    <p class="mb-4"><strong>Release Date:</strong> {{ $videoGame->release_date }}</p>

    <div class="mt-4">
        <a href="{{ route('video_games.edit', $videoGame->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
        <form action="{{ route('video_games.destroy', $videoGame->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
        </form>
        <a href="{{ route('video_games.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to List</a>
    </div>
@endsection
