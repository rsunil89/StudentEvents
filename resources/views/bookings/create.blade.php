<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Book Event
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4">{{ $event->title }}</h3>

                <p class="mb-2"><strong>Description:</strong> {{ $event->description }}</p>
                <p class="mb-2"><strong>Date:</strong> {{ $event->date }}</p>
                <p class="mb-4"><strong>Location:</strong> {{ $event->location }}</p>

                <form method="POST" action="{{ route('bookings.store', $event->id) }}">
                    @csrf

                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Confirm Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>