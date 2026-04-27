<footer class="bg-gray-950 text-gray-400 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-8">

        <div class="flex flex-col md:flex-row justify-between items-center gap-4">

            <!-- Left -->
            <div class="text-sm text-center md:text-left">
                <p class="text-gray-300 font-semibold">Campus Event System</p>
                <p class="text-gray-500 text-xs mt-1">
                    Built with Laravel MVC • Server-Side Development CA2
                </p>
            </div>

            <!-- Links -->
            <div class="flex gap-6 text-sm">
                <a href="{{ route('events.index') }}" class="hover:text-white">Events</a>
                <a href="{{ route('dashboard') }}" class="hover:text-white">Dashboard</a>
                <a href="{{ route('bookings.index') }}" class="hover:text-white">Bookings</a>
            </div>

        </div>

        <div class="mt-6 text-center text-xs text-gray-600">
            © {{ date('Y') }} Event Booking System
        </div>

    </div>
</footer>
