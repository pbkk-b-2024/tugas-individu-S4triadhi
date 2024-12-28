<?php

namespace App\Http\Controllers;

use App\Models\VideoGame;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\EsrbRating;
use App\Models\GameConsole;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VideoGameController extends Controller
{
    // Display a listing of the video games
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $videoGames = VideoGame::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })
        ->with(['developer', 'publisher', 'esrbRating', 'genre']) // Eager load relationships
        ->orderBy('title', 'asc')
        ->paginate(10);

        return view('video_games.index', compact('videoGames'));
    }

    // Show the form for creating a new video game
    public function create(): View
    {
        $consoles = GameConsole::all();
        $developers = Developer::all();
        $publishers = Publisher::all();
        $esrbRatings = EsrbRating::all(); 
        $genres = Genre::all();
        
        return view('video_games.create', compact('consoles', 'developers', 'publishers', 'esrbRatings', 'genres'));
    }
    

    // Store a newly created video game in storage
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'developer_id' => 'required|exists:developers,id',
            'publisher_id' => 'required|exists:publishers,id',
            'esrb_rating_id' => 'required|exists:esrb_ratings,id',
            'console_id' => 'nullable|exists:game_consoles,id',
            'release_date' => 'nullable|date',
            'genre_id' => 'required|array', // Accept an array of genre IDs
            'genre_id.*' => 'exists:genres,id', // Each genre ID must exist in genres table
        ]);
    
        // Create the video game without genres
        $videoGame = VideoGame::create($request->except('genre_id')); // Store the video game without genres
    
        // Attach the selected genres to the video game
        $videoGame->genres()->attach($request->input('genre_id'));
    
        return redirect()->route('video_games.index')->with('success', 'Video Game created successfully.');
    }
    

    // Display the specified video game
    public function show(VideoGame $videoGame): View
    {
        $videoGame->load('genres'); // Eager load genres relationship
        return view('video_games.show', compact('videoGame'));
    }
    

    public function edit(VideoGame $videoGame): View
    {
        $developers = Developer::all();
        $publishers = Publisher::all();
        $esrbRatings = EsrbRating::all(); 
        $genres = Genre::all();
        $consoles = GameConsole::all();
        
        return view('video_games.edit', compact('videoGame', 'developers', 'publishers', 'esrbRatings', 'genres', 'consoles'));
    }
    
    // Update the specified video game in storage
    public function update(Request $request, VideoGame $videoGame): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'developer_id' => 'required|exists:developers,id',
            'publisher_id' => 'required|exists:publishers,id',
            'esrb_rating_id' => 'required|exists:esrb_ratings,id',
            'genre_id' => 'required|array', // Validate as an array
            'genre_id.*' => 'exists:genres,id', // Validate each genre ID
            'console_id' => 'nullable|exists:game_consoles,id',
            'release_date' => 'nullable|date',
        ]);

        $videoGame->update($request->except('genre_id')); // Update without genre_id
        $videoGame->genres()->sync($request->input('genre_id')); // Sync genres

        return redirect()->route('video_games.index')->with('success', 'Video Game updated successfully.');
    }

    // Remove the specified video game from storage
    public function destroy(VideoGame $videoGame): RedirectResponse
    {
        $videoGame->delete();

        return redirect()->route('video_games.index')->with('success', 'Video Game deleted successfully.');
    }
}
