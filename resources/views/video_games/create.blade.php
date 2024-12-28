@extends('layouts.master')

@section('title', 'Create Video Game')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create Video Game</h2>

    <form action="{{ route('video_games.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" class="border p-2 w-full" required />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" class="border p-2 w-full" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label for="developer_id" class="block text-sm font-medium text-gray-700">Developer</label>
            <select id="developer_id" name="developer_id" class="border p-2 w-full" required>
                <option value="">Select a developer</option>
                @foreach ($developers as $developer)
                    <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="publisher_id" class="block text-sm font-medium text-gray-700">Publisher</label>
            <select id="publisher_id" name="publisher_id" class="border p-2 w-full" required>
                <option value="">Select a publisher</option>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="esrb_ratings_id" class="block text-gray-700">ESRB Rating:</label>
            <select name="esrb_ratings_id" id="esrb_ratings_id" class="border p-2 rounded w-full">
                <option value="">Select ESRB Rating</option>
                @foreach($esrbRatings as $esrbRating)
                    <option value="{{ $esrbRating->id }}">{{ $esrbRating->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="genre_id" class="block text-sm font-medium text-gray-700">Genres</label>
            <select id="genre_id" name="genre_id[]" multiple class="border p-2 w-full">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="console_id" class="block text-sm font-medium text-gray-700">Console</label>
            <select id="console_id" name="console_id" class="border p-2 w-full">
                <option value="">Select a console</option>
                @foreach ($consoles as $console)
                    <option value="{{ $console->id }}">{{ $console->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
            <input type="date" id="release_date" name="release_date" class="border p-2 w-full" />
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Video Game</button>
    </form>

    <a href="{{ route('video_games.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mt-4 inline-block">Back</a>
@endsection
