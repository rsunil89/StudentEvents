<x-app-layout>
    @php($isAdmin = auth()->check() && auth()->user()->role === 'admin')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-white leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="min-h-screen bg-white text-gray-900 dark:bg-gray-900 dark:text-white py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Student Event App</h1>
                <p class="mt-3 text-gray-700 dark:text-gray-300 max-w-3xl">
                    Browse campus events, book places, manage your bookings, and handle event administration through Laravel controllers, migrations, validation, and authentication scaffolding.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('events.index') }}"
                       class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                        Browse Events
                    </a>

                    <a href="{{ route('bookings.index') }}"
                       class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                        My Bookings
                    </a>

                    @if($isAdmin)
                        <a href="{{ route('events.create') }}"
                           class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Create Event
                        </a>
                    @elseif(! auth()->check())
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Log In
                        </a>
                    @endif
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Events Listed</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['events'] }}</p>
                </div>

                <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Upcoming Events</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['upcomingEvents'] }}</p>
                </div>

                <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Bookings</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['bookings'] }}</p>
                </div>

                <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Admins</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">{{ $stats['admins'] }}</p>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">How the App Works</h3>
                    <ul class="mt-4 space-y-3 text-sm text-gray-700 dark:text-gray-300">
                        <li>Students can browse events, reserve places, and review their bookings.</li>
                        <li>Admins can create, edit, and delete events while monitoring booking activity.</li>
                        <li>Event capacity is managed through the event records and booking counts.</li>
                    </ul>
                </div>

                <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Laravel Structure</h3>
                    <ul class="mt-4 space-y-3 text-sm text-gray-700 dark:text-gray-300">
                        <li>Migrations define and share the database schema.</li>
                        <li>Controllers group event and booking request logic.</li>
                        <li>Validation protects incoming event data before writes happen.</li>
                        <li>Authentication starter kits provide the base login and session flow.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Featured Events</h3>
                        <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">Upcoming events pulled from the database.</p>
                    </div>

                    <a href="{{ route('events.index') }}"
                       class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                        View all
                    </a>
                </div>

                <div class="mt-6 grid gap-4 lg:grid-cols-3">
                    @forelse($featuredEvents as $event)
                        <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-5">
                            <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($event->event_date)->format('D, d M Y') }}
                            </p>

                            <h4 class="mt-3 text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $event->title }}
                            </h4>

                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                                {{ \Illuminate\Support\Str::limit($event->description, 120) }}
                            </p>

                            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                                <p>{{ $event->location }}</p>
                                <p>{{ $event->bookings_count }}/{{ $event->capacity }} booked</p>
                            </div>

                            <a href="{{ route('events.show', $event) }}"
                               class="mt-4 inline-flex text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                Open Event
                            </a>
                        </div>
                    @empty
                        <p class="text-sm text-gray-700 dark:text-gray-300 lg:col-span-3">
                            No events have been created yet.
                        </p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>