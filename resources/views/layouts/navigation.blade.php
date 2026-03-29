<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                    Better Process
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                <a href="{{ route('aboutus') }}" class="text-gray-700 hover:text-blue-600 transition">About Us</a>
                <a href="{{ route('services') }}" class="text-gray-700 hover:text-blue-600 transition">Services</a>
                <a href="{{ route('gallery.index') }}" class="text-gray-700 hover:text-blue-600 transition">Gallery</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
                <a href="{{ route('blue-ocean') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Blue Ocean Review
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 transition">
                        Admin
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded">Home</a>
            <a href="{{ route('aboutus') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded">About Us</a>
            <a href="{{ route('services') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded">Services</a>
            <a href="{{ route('gallery.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded">Gallery</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded">Contact</a>
            <a href="{{ route('blue-ocean') }}" class="block px-3 py-2 bg-blue-600 text-white rounded">Blue Ocean Review</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 text-gray-700 hover:bg-blue-50 rounded">Admin Panel</a>
            @endauth
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    if (btn && menu) {
        btn.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });
    }
});
</script>
