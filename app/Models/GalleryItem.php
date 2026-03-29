<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'image_alt',
        'additional_images',
        'category',
        'client',
        'project_url',
        'is_featured',
        'is_published',
        'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'order' => 'integer',
        'additional_images' => 'array',
    ];

    protected $table = 'gallery_items';

    /**
     * Boot the model and auto-generate slug from title.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->title);
            }
        });

        static::updating(function ($item) {
            if (empty($item->slug)) {
                $item->slug = Str::slug($item->title);
            }
        });
    }

    /**
     * Use slug for route model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope for published items.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope for featured items.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
