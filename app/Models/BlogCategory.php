<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class BlogCategory extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'blog_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
