<?php

namespace App\Http\Controllers;

use App\Models\EsportEvent;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EsportEventController extends Controller
{
    // Display a listing of the events
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $esport_events = EsportEvent::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('location', 'like', "%{$search}%");
        })
        ->orderBy('event_date', 'asc')
        ->paginate(10);

        return view('esport_events.index', compact('esport_events'));
    }

    // Show the form for creating a new event
    public function create(): View
    {
        return view('esport_events.create');
    }

    // Store a newly created event
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'prize_pool' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        EsportEvent::create($request->all());

        return redirect()->route('esport_events.index')->with('success', 'Esport Event created successfully.');
    }

    // Display the specified event
    public function show(EsportEvent $esport_event): View
    {
        return view('esport_events.show', compact('esport_event'));
    }

    // Show the form for editing the specified event
    public function edit(EsportEvent $esport_event): View
    {
        return view('esport_events.edit', compact('esport_event'));
    }

    // Update the specified event
    public function update(Request $request, EsportEvent $esport_event): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'prize_pool' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $esport_event->update($request->all());

        return redirect()->route('esport_events.index')->with('success', 'Esport Event updated successfully.');
    }

    // Remove the specified event
    public function destroy(EsportEvent $esport_event): RedirectResponse
    {
        $esport_event->delete();

        return redirect()->route('esport_events.index')->with('success', 'Esport Event deleted successfully.');
    }
}
