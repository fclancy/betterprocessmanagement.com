<x-app-layout>
    <!-- Breadcrumb -->
    <nav class="bg-gray-100 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">Home</a></li>
                <li>/</li>
                <li><a href="{{ route('gallery.index') }}" class="hover:text-blue-600">Gallery</a></li>
                <li>/</li>
                <li class="font-medium text-gray-900">{{ $galleryItem->title }}</li>
            </ol>
        </div>
    </nav>

    <!-- Project Detail -->
    <article class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Column -->
                <div class="lg:col-span-2">
                    <!-- Title & Meta -->
                    <header class="mb-8">
                        <div class="flex items-center gap-2 mb-2">
                            @if($galleryItem->category)
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ ucwords(str_replace('-', ' ', $galleryItem->category)) }}
                                </span>
                            @endif
                            @if($galleryItem->is_featured)
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">Featured</span>
                            @endif
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $galleryItem->title }}</h1>
                        @if($galleryItem->client)
                            <p class="text-gray-600 mt-2">Client: <strong>{{ $galleryItem->client }}</strong></p>
                        @endif
                    </header>

                    <!-- Main Image -->
                    @if($galleryItem->image_path)
                        <div class="mb-8">
                            <img src="{{ asset('storage/' . $galleryItem->image_path) }}" alt="{{ $galleryItem->image_alt ?? $galleryItem->title }}" class="w-full rounded-lg shadow-lg">
                        </div>
                    @endif

                    <!-- Description -->
                    <div class="prose max-w-none">
                        {!! nl2br(e($galleryItem->description)) !!}
                    </div>

                    <!-- Additional Images -->
                    @if($galleryItem->additional_images && count($galleryItem->additional_images))
                        <section class="mt-12">
                            <h2 class="text-2xl font-bold mb-6">Additional Images</h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($galleryItem->additional_images as $img)
                                    <div class="rounded overflow-hidden shadow">
                                        <img src="{{ asset('storage/' . $img) }}" alt="" class="w-full h-48 object-cover hover:opacity-90 transition">
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    <!-- External Project Link -->
                    @if($galleryItem->project_url)
                        <div class="mt-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <h3 class="font-semibold text-blue-900">View Project</h3>
                            <a href="{{ $galleryItem->project_url }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline">
                                {{ $galleryItem->project_url }} ↗
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <div class="bg-gray-50 p-6 rounded-lg shadow sticky top-6">
                        <h3 class="font-semibold text-gray-900 mb-4">Project Details</h3>
                        <dl class="space-y-3 text-sm">
                            @if($galleryItem->category)
                                <div>
                                    <dt class="text-gray-600">Category</dt>
                                    <dd class="font-medium">{{ ucwords(str_replace('-', ' ', $galleryItem->category)) }}</dd>
                                </div>
                            @endif
                            @if($galleryItem->client)
                                <div>
                                    <dt class="text-gray-600">Client</dt>
                                    <dd class="font-medium">{{ $galleryItem->client }}</dd>
                                </div>
                            @endif
                            <div>
                                <dt class="text-gray-600">Last Updated</dt>
                                <dd class="font-medium">{{ $galleryItem->updated_at->format('F j, Y') }}</dd>
                            </div>
                        </dl>

                        @auth
                            <div class="mt-6 pt-6 border-t">
                                <p class="text-sm text-gray-600 mb-3">Administrator Actions:</p>
                                <div class="space-x-2">
                                    <a href="{{ route('admin.gallery.edit', $galleryItem) }}" class="inline-block px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </aside>
            </div>
        </div>
    </article>

    <!-- Related Projects -->
    @if($related->count())
        <section class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold mb-6">Related Projects</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($related as $item)
                        <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                            @if($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4">
                                <h3 class="font-semibold mb-2">
                                    <a href="{{ route('gallery.show', $item) }}" class="text-gray-900 hover:text-blue-600">
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm">{{ Str::limit($item->description, 80) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-app-layout>
