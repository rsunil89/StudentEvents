<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:255',
        'event_date' => 'required|date',
        'capacity' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('events', 'public');
    }

    Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'location' => $request->location,
        'event_date' => $request->event_date,
        'capacity' => $request->capacity,
        'image' => $imagePath,
    ]);

    return redirect()->route('events.index')->with('success', 'Event created successfully.');
}

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_date' => $request->event_date,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function dashboard()
    {
        $featuredEvents = Event::withCount('bookings')
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        $stats = [
            'events' => Event::count(),
            'upcomingEvents' => Event::where('event_date', '>=', now())->count(),
            'bookings' => Booking::count(),
            'admins' => Schema::hasColumn('users', 'role')
                ? User::where('role', 'admin')->count()
                : 0,
        ];

        return view('dashboard', compact('featuredEvents', 'stats'));
    }

    public function welcome()
    {
        $events = Event::orderBy('event_date', 'asc')->get();

        return view('welcome', compact('events'));
    }
}