@extends('layouts.master')

@section('title', 'Edit Video Game')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Video Game</h2>

    <form action="{{ route('video_games.update', $videoGame->id) }}" method="POST" class="mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $videoGame->title) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">{{ old('description', $videoGame->description) }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="developer_id" class="block text-sm font-medium text-gray-700">Developer</label>
            <select name="developer_id" id="developer_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                <option value="">Select Developer</option>
                @foreach ($developers as $developer)
                    <option value="{{ $developer->id }}" {{ $developer->id == old('developer_id', $videoGame->developer_id) ? 'selected' : '' }}>
                        {{ $developer->name }}
                    </option>
                @endforeach
            </select>
            @error('developer_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="publisher_id" class="block text-sm font-medium text-gray-700">Publisher</label>
            <select name="publisher_id" id="publisher_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                <option value="">Select Publisher</option>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}" {{ $publisher->id == old('publisher_id', $videoGame->publisher_id) ? 'selected' : '' }}>
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
            @error('publisher_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="esrb_rating_id" class="block text-sm font-medium text-gray-700">ESRB Rating</label>
            <select name="esrb_rating_id" id="esrb_rating_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                <option value="">Select ESRB Rating</option>
                @foreach ($esrbRatings as $esrbRating)
                    <option value="{{ $esrbRating->id }}" {{ $esrbRating->id == old('esrb_rating_id', $videoGame->esrb_rating_id) ? 'selected' : '' }}>
                        {{ $esrbRating->name }}
                    </option>
                @endforeach
            </select>
            @error('esrb_rating_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="genre_id" class="block text-sm font-medium text-gray-700">Genres</label>
            <select name="genre_id[]" id="genre_id" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $videoGame->genres->contains($genre) ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="console_id" class="block text-sm font-medium text-gray-700">Console</label>
            <select name="console_id" id="console_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                <option value="">Select Console</option>
                @foreach ($consoles as $console)
                    <option value="{{ $console->id }}" {{ $console->id == old('console_id', $videoGame->console_id) ? 'selected' : '' }}>
                        {{ $console->name }}
                    </option>
                @endforeach
            </select>
            @error('console_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date', $videoGame->release_date) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" />
            @error('release_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Video Game</button>
            <a href="{{ route('video_games.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
@endsection
