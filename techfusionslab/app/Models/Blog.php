<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'content',
        'main_image',
        'author_name',
        'author_image',
        'published_at',
        'tags',
        'category',
        'is_featured',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    // Auto-generate slug from title if not provided
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = static::generateUniqueSlug($blog->title);
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title')) {
                $blog->slug = static::generateUniqueSlug($blog->title, $blog->id);
            }
        });
    }

    private static function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($excludeId, fn($query) => $query->where('id', '!=', $excludeId))
            ->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}
