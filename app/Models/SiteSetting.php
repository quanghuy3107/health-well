<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'site_settings';

    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
        'label',
    ];

    /**
     * Get a setting value by key with optional default.
     */
    public static function getValue(string $key, $default = null)
    {
        return Cache::remember("site_setting_{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Set a setting value by key.
     */
    public static function setValue(string $key, $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        Cache::forget("site_setting_{$key}");
    }

    /**
     * Get all settings grouped.
     */
    public static function getAllGrouped(): array
    {
        return Cache::remember('site_settings_all', 3600, function () {
            return static::all()->groupBy('group')->toArray();
        });
    }

    /**
     * Clear all settings cache.
     */
    public static function clearCache(): void
    {
        $settings = static::all();
        foreach ($settings as $setting) {
            Cache::forget("site_setting_{$setting->key}");
        }
        Cache::forget('site_settings_all');
    }
}
