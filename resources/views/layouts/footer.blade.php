<footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Better Process Management</h3>
                <p class="text-gray-300">
                    Expert consulting in business process management, efficiency optimization, and cost reduction.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-md font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
                    <li><a href="{{ route('aboutus') }}" class="text-gray-300 hover:text-white">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-white">Services</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="text-gray-300 hover:text-white">Gallery</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h4 class="text-md font-semibold mb-4">Resources</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('faq') }}" class="text-gray-300 hover:text-white">FAQ</a></li>
                    <li><a href="{{ route('blue-ocean') }}" class="text-gray-300 hover:text-white">Blue Ocean Review</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-gray-300 hover:text-white">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="text-gray-300 hover:text-white">Terms of Service</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-md font-semibold mb-4">Contact</h4>
                <address class="text-gray-300 not-italic">
                    <p>info@betterprocessmanagement.com</p>
                    <p>Stoney Creek, Ontario</p>
                    <p>Canada</p>
                </address>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Better Process Management. All rights reserved.</p>
        </div>
    </div>
</footer>
