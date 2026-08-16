<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class BlogPost extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'blog_posts';

    protected $fillable = [
        'slug',
        'title',
        'meta_title',
        'meta_description',
        'focus_keywords',
        'excerpt',
        'content',
        'image',
        'image_alt',
        'date',
        'published_date',
        'category',
        'author',
        'read_time',
        'schema',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'focus_keywords' => 'array',
        'schema' => 'array',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}
