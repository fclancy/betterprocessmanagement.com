<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display the demonstration gallery index.
     */
    public function index()
    {
        $items = GalleryItem::where('is_published', true)->latest()->paginate(12);
        $categories = GalleryItem::select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('gallery.index', compact('items', 'categories'));
    }

    /**
     * Display a single gallery item.
     */
    public function show(GalleryItem $galleryItem)
    {
        if (!$galleryItem->is_published) {
            abort(404);
        }

        // Get related items (same category, excluding current)
        $related = GalleryItem::where('category', $galleryItem->category)
            ->where('id', '!=', $galleryItem->id)
            ->where('is_published', true)
            ->take(3)
            ->get();

        return view('gallery.show', compact('galleryItem', 'related'));
    }
}
