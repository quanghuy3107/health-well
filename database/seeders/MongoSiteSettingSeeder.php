<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class MongoSiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'HomeWellness', 'group' => 'general', 'type' => 'text', 'label' => 'Tên website'],
            ['key' => 'site_tagline', 'value' => 'Your Home, Your Wellness', 'group' => 'general', 'type' => 'text', 'label' => 'Tagline'],
            ['key' => 'site_description', 'value' => 'Premium home wellness products and fitness equipment reviews', 'group' => 'general', 'type' => 'textarea', 'label' => 'Mô tả website'],
            ['key' => 'logo', 'value' => '/images/logo-optimized.png', 'group' => 'general', 'type' => 'image', 'label' => 'Logo'],
            ['key' => 'favicon', 'value' => '/favicon-optimized.png', 'group' => 'general', 'type' => 'image', 'label' => 'Favicon'],

            // Contact
            ['key' => 'contact_email', 'value' => 'contact@homewellnessforyou.com', 'group' => 'contact', 'type' => 'email', 'label' => 'Email liên hệ'],
            ['key' => 'contact_phone', 'value' => '', 'group' => 'contact', 'type' => 'text', 'label' => 'Số điện thoại'],
            ['key' => 'contact_address', 'value' => '', 'group' => 'contact', 'type' => 'textarea', 'label' => 'Địa chỉ'],

            // Social Media
            ['key' => 'facebook_url', 'value' => '', 'group' => 'social', 'type' => 'url', 'label' => 'Facebook URL'],
            ['key' => 'instagram_url', 'value' => '', 'group' => 'social', 'type' => 'url', 'label' => 'Instagram URL'],
            ['key' => 'youtube_url', 'value' => '', 'group' => 'social', 'type' => 'url', 'label' => 'YouTube URL'],
            ['key' => 'twitter_url', 'value' => '', 'group' => 'social', 'type' => 'url', 'label' => 'Twitter/X URL'],

            // SEO
            ['key' => 'meta_title', 'value' => 'HomeWellness - Premium Home & Fitness Products', 'group' => 'seo', 'type' => 'text', 'label' => 'Meta Title'],
            ['key' => 'meta_description', 'value' => 'Discover the best home wellness products, fitness equipment, and health tools for a better lifestyle.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Meta Description'],
            ['key' => 'google_analytics_id', 'value' => '', 'group' => 'seo', 'type' => 'text', 'label' => 'Google Analytics ID'],

            // Footer
            ['key' => 'footer_text', 'value' => '© 2026 HomeWellness. All rights reserved.', 'group' => 'footer', 'type' => 'text', 'label' => 'Footer text'],
            ['key' => 'footer_disclaimer', 'value' => 'As an Amazon Associate, we earn from qualifying purchases.', 'group' => 'footer', 'type' => 'textarea', 'label' => 'Disclaimer'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        $this->command->info(count($settings) . ' site settings seeded.');
    }
}
