<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'link_url',
        'order',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
        'order' => 'integer',
    ];

    protected $table = 'gallery_items';
}
