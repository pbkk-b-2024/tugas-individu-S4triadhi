<?php

namespace App\Http\Controllers;

use App\Models\GameConsole;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GameConsoleController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the game consoles.
     */
    public function index(Request $request)
    {
        try {
            // Authorize viewAny action for game consoles
            $this->authorize('viewAny', GameConsole::class);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('home')->with('error', 'You do not have permission to view this page.');
        }

        $search = $request->input('search');

        $consoles = GameConsole::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('manufacturer', 'like', "%{$search}%");
            })
            ->paginate(10); // Paginate the results

        return view('game_consoles.index', compact('consoles'));
    }

    /**
     * Show the form for creating a new game console.
     */
    public function create()
    {
        // Authorize create action
        $this->authorize('create', GameConsole::class);

        return view('game_consoles.create');
    }

    /**
     * Store a newly created game console in storage.
     */
    public function store(Request $request)
    {
        // Authorize create action
        $this->authorize('create', GameConsole::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer',
            'generation' => 'nullable|string|max:50',
            'discontinued_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        GameConsole::create($request->all());

        return redirect()->route('game_consoles.index')->with('success', 'Game console created successfully.');
    }

    /**
     * Display the specified game console.
     */
    public function show(GameConsole $gameConsole)
    {
        // Authorize view action
        $this->authorize('view', $gameConsole);

        return view('game_consoles.show', compact('gameConsole'));
    }

    /**
     * Show the form for editing the specified game console.
     */
    public function edit(GameConsole $gameConsole)
    {
        // Authorize update action
        $this->authorize('update', $gameConsole);

        return view('game_consoles.edit', compact('gameConsole'));
    }

    /**
     * Update the specified game console in storage.
     */
    public function update(Request $request, GameConsole $gameConsole)
    {
        // Authorize update action
        $this->authorize('update', $gameConsole);

        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer',
            'generation' => 'nullable|string|max:50',
            'discontinued_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $gameConsole->update($request->all());

        return redirect()->route('game_consoles.index')->with('success', 'Game console updated successfully.');
    }

    /**
     * Remove the specified game console from storage.
     */
    public function destroy(GameConsole $gameConsole)
    {
        // Authorize delete action
        $this->authorize('delete', $gameConsole);

        $gameConsole->delete();

        return redirect()->route('game_consoles.index')->with('success', 'Game console deleted successfully.');
    }
}
