<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Auth::check()
            ? Booking::with('event')
                ->where('user_id', Auth::id())
                ->latest()
                ->get()
            : collect();

        return view('bookings.index', compact('bookings'));
    }

    public function store(Event $event)
    {
        $existingBooking = Booking::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->first();

        if ($existingBooking) {
            return redirect()->route('events.index')
                ->with('success', 'You already booked this event.');
        }

        $bookingCount = Booking::where('event_id', $event->id)->count();

        if ($bookingCount >= $event->capacity) {
            return redirect()->route('events.index')
                ->with('success', 'This event is full.');
        }

        Booking::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }
}