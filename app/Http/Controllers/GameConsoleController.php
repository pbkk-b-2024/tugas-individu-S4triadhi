<?php

namespace App\Http\Controllers;

use App\Models\GameConsole;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GameConsoleController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $gameConsoles = GameConsole::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('manufacturer', 'like', "%{$search}%");
        })
        ->orderBy('name', 'asc')
        ->paginate(10);

        return view('game_consoles.index', compact('gameConsoles'));
    }

    public function create(): View
    {
        return view('game_consoles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'generation' => 'nullable|string|max:255',
        ]);

        GameConsole::create($request->all());

        return redirect()->route('game_consoles.index')->with('success', 'Game Console created successfully.');
    }

    public function show(GameConsole $gameConsole): View
    {
        return view('game_consoles.show', compact('gameConsole'));
    }

    public function edit(GameConsole $gameConsole): View
    {
        return view('game_consoles.edit', compact('gameConsole'));
    }

    public function update(Request $request, GameConsole $gameConsole): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'generation' => 'nullable|string|max:255',
        ]);

        $gameConsole->update($request->all());

        return redirect()->route('game_consoles.index')->with('success', 'Game Console updated successfully.');
    }

    public function destroy(GameConsole $gameConsole): RedirectResponse
    {
        $gameConsole->delete();

        return redirect()->route('game_consoles.index')->with('success', 'Game Console deleted successfully.');
    }
}
