<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class MongoBlogSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'slug' => 'best-cordless-vacuums-2026',
                'title' => 'The 5 Best Cordless Vacuums for a Cleaner Home in 2026',
                'meta_title' => 'Best Cordless Vacuums 2026: Top 5 Picks',
                'meta_description' => 'Discover the top 5 cordless vacuums of 2026, featuring high-performance suction, AI technology, and advanced HEPA filtration.',
                'focus_keywords' => ['best cordless vacuum 2026', 'cordless vacuum cleaner', 'smart home cleaning'],
                'excerpt' => 'Discover the top 5 cordless vacuums of 2026, featuring high-performance suction, AI technology, and advanced HEPA filtration for a spotless home.',
                'image' => '/images/cordless-vacuums-blog.jpg',
                'image_alt' => 'Best cordless vacuums 2026',
                'date' => 'May 4, 2026',
                'published_date' => '2026-05-04T21:00:00+07:00',
                'category' => 'Smart Health',
                'author' => 'Sarah Jenkins',
                'read_time' => '6 min read',
                'content' => $this->getVacuumContent(),
                'schema' => [],
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'best-air-purifiers-2026',
                'title' => 'Top 5 Best Air Purifiers for a Healthier Home in 2026: Expert Reviews',
                'meta_title' => 'Best Air Purifiers 2026: Top 5 Expert Reviews & Picks',
                'meta_description' => 'Cut through smoke, allergens & pet dander. We tested the top 5 HEPA H13 air purifiers of 2026.',
                'focus_keywords' => ['best air purifier 2026', 'HEPA H13 filter air purifier', 'air quality sensor purifier'],
                'excerpt' => 'Indoor air quality has never mattered more. Discover the 5 best air purifiers of 2026 with HEPA H13 filtration and smart air quality sensors.',
                'image' => '/images/air-purifiers.jpg',
                'image_alt' => 'Top 5 best air purifiers of 2026',
                'date' => 'May 4, 2026',
                'published_date' => '2026-05-04T21:00:00+07:00',
                'category' => 'Smart Health',
                'author' => 'Dr. Mia Collins',
                'read_time' => '8 min read',
                'content' => $this->getAirPurifierContent(),
                'schema' => [
                    '@context' => 'https://schema.org',
                    '@type' => 'BlogPosting',
                    'headline' => 'Top 5 Best Air Purifiers for a Healthier Home in 2026: Expert Reviews',
                    'description' => 'Cut through smoke, allergens & pet dander. We tested the top 5 HEPA H13 air purifiers of 2026.',
                    'datePublished' => '2026-05-04T21:00:00+07:00',
                    'dateModified' => '2026-05-04T21:00:00+07:00',
                    'author' => ['@type' => 'Person', 'name' => 'Dr. Mia Collins'],
                    'articleSection' => 'Smart Health',
                    'wordCount' => 1200,
                ],
                'is_published' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }

        $this->command->info(count($posts) . ' blog posts seeded.');
    }

    private function getVacuumContent(): string
    {
        return '<h2>Welcome to the Future of Smart Home Cleaning</h2>
<p>Vacuum technology has evolved dramatically in 2026, bringing us unprecedented advancements like AI-driven floor sensors, ultra-efficient battery life, and self-emptying base stations that actually work.</p>

<h2>1. Dyson Gen5detect Absolute</h2>
<p>The undisputed king of high-performance suction with 280 AW power and whole-machine HEPA filtration.</p>

<h2>2. Shark Stratos Cordless with Clean Sense IQ</h2>
<p>Best for Pet Hair — Clean Sense IQ automatically boosts power on tougher messes.</p>

<h2>3. Samsung Bespoke Jet AI</h2>
<p>Best Premium Design with integrated Clean Station that automatically empties the dustbin.</p>

<h2>4. Tineco Pure ONE S15 Pet</h2>
<p>Best Budget-Friendly Smart Vacuum with iLoop Smart Sensor technology.</p>

<h2>5. LG CordZero A9 Kompressor</h2>
<p>Best for Large Homes with dual rechargeable batteries and dust-compressing technology.</p>

<h2>Conclusion</h2>
<p>Upgrading to the best cordless vacuum 2026 has to offer will transform your cleaning routine from a frustrating chore into a seamless experience.</p>';
    }

    private function getAirPurifierContent(): string
    {
        return '<h2>Why Indoor Air Quality Matters More Than Ever in 2026</h2>
<p>The air inside your home can be up to five times more polluted than outdoors. Whether you are battling seasonal allergens, pet dander, or wildfire smoke, the right air purifier can be a game-changer.</p>

<h2>1. Alen BreatheSmart 75i</h2>
<p>Best For Large Open Living Spaces — 2,800 sq ft coverage with Pure HEPA filter capturing 99.99% of particles.</p>

<h2>2. Medify MA-50 V3.0</h2>
<p>Best For Wildfire Smoke — True H13 HEPA filter removes 99.9% of particles down to 0.1 microns.</p>

<h2>3. BLUEAIR Blue Pure 211i Max</h2>
<p>Overall Winner — HEPASilent technology with 3,048 sq ft/hr coverage and WiFi connectivity.</p>

<h2>4. WINIX 5510</h2>
<p>Best For Smart Homes & Odor Removal — 4-stage filtration with PlasmaWave technology.</p>

<h2>5. LEVOIT Vital 200S-P</h2>
<p>Best Budget Smart Purifier — Real-time PM2.5 laser sensor with Alexa & Google Assistant support.</p>

<h2>Verdict</h2>
<p>The BLUEAIR Blue Pure 211i Max takes the crown as our overall best air purifier for 2026.</p>';
    }
}
