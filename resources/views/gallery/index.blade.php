<x-app-layout>
    <!-- Hero -->
    <section class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold">Project Gallery</h1>
            <p class="text-lg mt-2 text-gray-300">Explore our work in business process management, cost optimization, and IT strategy.</p>
        </div>
    </section>

    <!-- Filter Bar -->
    <section class="bg-white border-b py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-2 items-center">
                <span class="font-semibold text-gray-700">Filter:</span>
                <a href="{{ route('gallery.index') }}" class="px-3 py-1 rounded-full {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">All</a>
                @foreach($categories as $cat)
                    <a href="{{ route('gallery.index', ['category' => $cat]) }}" class="px-3 py-1 rounded-full {{ request('category') == $cat ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        {{ ucwords(str_replace('-', ' ', $cat)) }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($items->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($items as $item)
                        <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition group">
                            <a href="{{ route('gallery.show', $item) }}" class="block">
                                @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->image_alt ?? $item->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                        No Image
                                    </div>
                                @endif
                            </a>
                            <div class="p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-semibold text-lg mb-1">
                                            <a href="{{ route('gallery.show', $item) }}" class="text-gray-900 hover:text-blue-600">
                                                {{ $item->title }}
                                            </a>
                                        </h3>
                                        @if($item->category)
                                            <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 mb-2">
                                                {{ ucwords(str_replace('-', ' ', $item->category)) }}
                                            </span>
                                        @endif
                                        @if($item->client)
                                            <p class="text-sm text-gray-600">{{ $item->client }}</p>
                                        @endif
                                    </div>
                                    @if($item->is_featured)
                                        <span class="text-yellow-500" title="Featured">★</span>
                                    @endif
                                </div>
                                <p class="text-gray-600 text-sm mt-2">
                                    {{ Str::limit($item->description, 100) }}
                                </p>
                                <div class="mt-4">
                                    <a href="{{ route('gallery.show', $item) }}" class="text-blue-600 font-semibold text-sm hover:underline">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $items->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No gallery items found.</p>
                    @if(request('category'))
                        <a href="{{ route('gallery.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">Clear filter</a>
                    @endif
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
