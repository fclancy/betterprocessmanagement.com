<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * PageContent Model
 *
 * Stores editable content for static pages using a key-value approach.
 * Each page is identified by a unique page_key.
 * Content is stored as HTML (WYSIWYG).
 * Supports SEO metadata (meta_title, meta_description).
 */
class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_key',
        'content',
        'meta_title',
        'meta_description',
        'last_edited_by',
    ];

    protected $casts = [
        'last_edited_by' => 'integer',
    ];

    protected $table = 'page_contents';

    /**
     * Get the page content by key.
     */
    public static function getContent($pageKey, $default = null)
    {
        $page = static::where('page_key', $pageKey)->first();
        return $page ? $page->content : $default;
    }

    /**
     * Get the page meta title by key.
     */
    public static function getMetaTitle($pageKey, $default = null)
    {
        $page = static::where('page_key', $pageKey)->first();
        return $page && $page->meta_title ? $page->meta_title : $default;
    }

    /**
     * Get the page meta description by key.
     */
    public static function getMetaDescription($pageKey, $default = null)
    {
        $page = static::where('page_key', $pageKey)->first();
        return $page && $page->meta_description ? $page->meta_description : $default;
    }
}
