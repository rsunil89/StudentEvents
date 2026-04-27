<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 dark:text-white leading-tight">
            Create Event
        </h2>
    </x-slot>

    <div class="min-h-screen bg-white text-gray-900 dark:bg-gray-900 dark:text-white py-10">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white shadow rounded-xl p-6 dark:bg-gray-800 dark:text-white">

                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-1">New Event</h3>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-6">
                    Add event details below.
                </p>

                @if ($errors->any())
                    <div class="mb-4 rounded-lg border border-red-300 bg-red-50 text-red-700 dark:border-red-500 dark:bg-red-900/20 dark:text-red-300 p-3">
                        <ul class="text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Event Title</label>
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Enter event title"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Description</label>
                        <textarea
                            name="description"
                            rows="4"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Write a short description"
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Location</label>
                        <input
                            type="text"
                            name="location"
                            value="{{ old('location') }}"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Enter location"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Capacity</label>
                        <input
                            type="number"
                            name="capacity"
                            value="{{ old('capacity') }}"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Enter number of seats"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Event Date</label>
                        <input
                            type="datetime-local"
                            name="event_date"
                            value="{{ old('event_date') }}"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-900 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        >
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Event Image</label>
                        <input
                            type="file"
                            name="image"
                            class="block w-full text-sm text-gray-700 dark:text-gray-300 file:mr-4 file:rounded-lg file:border-0 file:bg-indigo-600 file:px-4 file:py-2 file:text-white hover:file:bg-indigo-700"
                        >
                    </div>

                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700"
                        >
                            Save Event
                        </button>

                        <a
                            href="{{ route('events.index') }}"
                            class="rounded-lg bg-gray-600 px-4 py-2 text-white hover:bg-gray-700"
                        >
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>