<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'slug',
        'name',
        'category_id',
        'category',
        'category_label',
        'image',
        'gallery_images',
        'description',
        'long_description',
        'original_price',
        'price',
        'price_numeric',
        'discount_percentage',
        'star_rating',
        'review_count',
        'affiliate_link',
        'key_features',
        'specifications',
        'frequently_bought_together',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'key_features' => 'array',
        'specifications' => 'array',
        'frequently_bought_together' => 'array',
        'price_numeric' => 'float',
        'discount_percentage' => 'integer',
        'star_rating' => 'float',
        'review_count' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function categoryRelation()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, string $categorySlug)
    {
        return $query->where('category', $categorySlug);
    }
}
