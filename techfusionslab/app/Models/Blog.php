<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

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
        'subtitle',
        'is_featured',
        'meta_title',
        'meta_description',
        'meta_keywords',

    ];
}
