<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            My Bookings
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-white">Booked Events</h3>
                    <p class="mt-1 text-sm text-gray-300">
                        View all the events you have booked.
                    </p>
                </div>

                <a href="{{ route('events.index') }}"
                   class="inline-flex items-center rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-blue-700 transition">
                    Browse Events
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-xl border border-green-500/30 bg-green-500/10 px-4 py-3 text-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if($bookings->count())
                <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/10 backdrop-blur-md shadow-xl">
                    <div class="border-b border-white/10 px-6 py-4">
                        <h4 class="text-lg font-semibold text-white">Your Booking History</h4>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-white/5">
                                <tr class="border-b border-white/10">
                                    <th class="px-6 py-4 text-sm font-semibold text-white">Event</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-white">Location</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-white">Event Date</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-white">Booked On</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-white text-center">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr class="border-b border-white/10 last:border-b-0 hover:bg-white/5 transition">

                                        <td class="px-6 py-4 text-white font-medium">
                                            {{ $booking->event->title }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-300">
                                            {{ $booking->event->location }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-300">
                                            {{ \Carbon\Carbon::parse($booking->event->event_date)->format('d M Y, H:i') }}
                                        </td>

                                        <td class="px-6 py-4 text-slate-300">
                                            {{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y') }}
                                        </td>

                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center justify-center rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-300 border border-green-400/30">
                                                Confirmed
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="rounded-2xl border border-white/10 bg-white/10 backdrop-blur-md p-10 text-center shadow-xl">
                    <h3 class="text-2xl font-bold text-white mb-2">No bookings yet</h3>
                    <p class="text-gray-300 mb-6">
                        You have not booked any events yet.
                    </p>

                    <a href="{{ route('events.index') }}"
                       class="inline-flex items-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition">
                        Explore Events
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>