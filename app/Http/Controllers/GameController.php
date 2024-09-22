<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Developer;
use App\Models\Publisher;
use App\Models\GameConsole;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GameController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        try {
            // Authorize viewAny action, based on the roles allowed to view games
            $this->authorize('viewAny', Game::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }

        $search = $request->input('search');
        $games = Game::with(['developer', 'publisher', 'categories', 'gameConsole'])
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('games.index', compact('games'));
    }

    public function create()
    {
        // Authorize the create action
        $this->authorize('create', Game::class);

        $developers = Developer::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        $consoles = GameConsole::all();

        return view('games.create', compact('developers', 'publishers', 'categories', 'consoles'));
    }

    public function store(Request $request)
    {
        // Authorize the create action
        $this->authorize('create', Game::class);

        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'description' => 'nullable|string',
            'rating' => 'nullable|string|max:10',
            'developer_id' => 'required|exists:developers,id',
            'publisher_id' => 'required|exists:publishers,id',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'consoles' => 'nullable|array',
            'consoles.*' => 'exists:game_consoles,id',
        ]);

        // Create the game
        $game = Game::create($request->only([
            'title', 'release_date', 'description', 'rating', 'developer_id', 'publisher_id'
        ]));

        // Attach categories
        if ($request->has('categories')) {
            $game->categories()->sync($request->input('categories'));
        }

        // Attach consoles
        if ($request->has('consoles')) {
            $game->gameConsole()->sync($request->input('consoles'));
        }

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }

    public function edit(Game $game)
    {
        // Authorize the update action
        $this->authorize('update', $game);

        $developers = Developer::all();
        $publishers = Publisher::all();
        $gameConsoles = GameConsole::all();
        $categories = Category::all();

        return view('games.edit', compact('game', 'developers', 'publishers', 'gameConsoles', 'categories'));
    }

    public function update(Request $request, Game $game)
    {
        // Authorize the update action
        $this->authorize('update', $game);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'description' => 'nullable|string',
            'rating' => 'nullable|numeric',
            'developer_id' => 'required|exists:developers,id',
            'publisher_id' => 'required|exists:publishers,id',
            'game_consoles' => 'nullable|array',
            'categories' => 'nullable|array',
        ]);

        $game->update($validated);

        if ($request->has('game_consoles')) {
            $game->gameConsoles()->sync($request->input('game_consoles'));
        } else {
            $game->gameConsoles()->detach();
        }

        if ($request->has('categories')) {
            $game->categories()->sync($request->input('categories'));
        } else {
            $game->categories()->detach();
        }

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        // Authorize the delete action
        $this->authorize('delete', $game);

        $game->gameConsole()->detach();
        $game->categories()->detach();
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }
}
