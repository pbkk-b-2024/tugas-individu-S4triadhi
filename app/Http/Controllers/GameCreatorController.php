<?php

namespace App\Http\Controllers;

use App\Models\GameCreator;
use App\Models\VideoGame;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GameCreatorController extends Controller
{
    // Display a listing of the game creators
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $gameCreators = GameCreator::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })
        ->with('videoGame') // Eager load video game relationship
        ->orderBy('name', 'asc')
        ->paginate(10);

        return view('game_creators.index', compact('gameCreators'));
    }

    // Show the form for creating a new game creator
    public function create(): View
    {
        $videoGames = VideoGame::all(); // Fetch all video games

        return view('game_creators.create', compact('videoGames'));
    }

    // Store a newly created game creator in storage
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'video_game_id' => 'required|exists:video_games,id',
        ]);

        GameCreator::create($request->all());

        return redirect()->route('game_creators.index')->with('success', 'Game Creator created successfully.');
    }

    // Display the specified game creator
    public function show(GameCreator $gameCreator): View
    {
        return view('game_creators.show', compact('gameCreator'));
    }

    // Show the form for editing the specified game creator
    public function edit(GameCreator $gameCreator): View
    {
        $videoGames = VideoGame::all(); // Fetch all video games

        return view('game_creators.edit', compact('gameCreator', 'videoGames'));
    }

    // Update the specified game creator in storage
    public function update(Request $request, GameCreator $gameCreator): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'video_game_id' => 'required|exists:video_games,id',
        ]);

        $gameCreator->update($request->all());

        return redirect()->route('game_creators.index')->with('success', 'Game Creator updated successfully.');
    }

    // Remove the specified game creator from storage
    public function destroy(GameCreator $gameCreator): RedirectResponse
    {
        $gameCreator->delete();

        return redirect()->route('game_creators.index')->with('success', 'Game Creator deleted successfully.');
    }
}
