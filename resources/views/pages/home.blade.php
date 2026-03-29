<x-app-layout :title="$title" :meta-description="$metaDescription">
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Transform Your Business Processes
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                    Expert consulting in Business Process Management (BPM), efficiency optimization, and cost reduction.
                    Empowering teams to achieve peak performance.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Get Started
                    </a>
                    <a href="{{ route('gallery.index') }}" class="border-2 border-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                        View Our Work
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    @if($featuredProjects->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Featured Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                <div class="rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                    @if($project->image_path)
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->image_alt ?? $project->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 120) }}</p>
                        <a href="{{ route('gallery.show', $project) }}" class="text-blue-600 hover:underline">Learn More →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Services Overview -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Services will be dynamically pulled from CMS in future --}}
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">Business Process Management</h3>
                    <p class="text-gray-600">Comprehensive BPM consulting to map, analyze, and optimize your business processes for maximum efficiency.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">Activity-Based Management</h3>
                    <p class="text-gray-600">ABM techniques to understand true costs and improve decision-making through accurate activity costing.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">Cost Optimization</h3>
                    <p class="text-gray-600">Strategic cost reduction without sacrificing quality, using data-driven analysis and process improvement.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">IT Strategy & Audits</h3>
                    <p class="text-gray-600">Technology assessments and strategic planning to align IT investments with business goals.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">Team Training</h3>
                    <p class="text-gray-600">Customized training programs to empower teams with BPM, ABM, and efficiency methodologies.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-3">Process Documentation</h3>
                    <p class="text-gray-600">Create clear, maintainable documentation of your business processes for consistency and knowledge transfer.</p>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('services') }}" class="text-blue-600 font-semibold hover:underline">View all services →</a>
            </div>
        </div>
    </section>

    <!-- Recent Projects -->
    @if($recentProjects->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Recent Work</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($recentProjects as $project)
                <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                    @if($project->image_path)
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $project->title }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $project->category ?? 'General' }}</p>
                        <p class="text-gray-600 text-sm">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('gallery.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    See Full Gallery
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="bg-blue-600 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Optimize Your Business?</h2>
            <p class="text-xl mb-8">
                Let's discuss how Better Process Management can help your organization achieve peak efficiency.
            </p>
            <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-block">
                Contact Us Today
            </a>
        </div>
    </section>
</x-app-layout>
