@extends('layouts.master')

@section('title', 'Create Game Creator')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create Game Creator</h2>

    <form action="{{ route('game_creators.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" />
        </div>
        <div class="mb-4">
            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
            <textarea name="bio" id="bio" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"></textarea>
        </div>
        <div class="mb-4">
            <label for="video_game_id" class="block text-sm font-medium text-gray-700">Video Game</label>
            <select name="video_game_id" id="video_game_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                <option value="">Select a video game</option>
                @foreach ($videoGames as $videoGame)
                    <option value="{{ $videoGame->id }}">{{ $videoGame->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Game Creator</button>
        </div>
    </form>
    <a href="{{ route('game_creators.index') }}" class="text-blue-500 mt-4 inline-block">Back to List</a>
@endsection
