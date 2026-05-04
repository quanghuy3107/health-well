<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private function getPosts()
    {
        return [
            [
                'slug' => 'best-cordless-vacuums-2026',
                'title' => 'The 5 Best Cordless Vacuums for a Cleaner Home in 2026',
                'excerpt' => 'Discover the top 5 cordless vacuums of 2026, featuring high-performance suction, AI technology, and advanced HEPA filtration for a spotless home.',
                'image' => asset('images/cordless-vacuums-blog.jpg'),
                'date' => 'May 4, 2026',
                'category' => 'Smart Health',
                'author' => 'Sarah Jenkins',
                'read_time' => '6 min read',
                'content' => "
<h2>Welcome to the Future of Smart Home Cleaning</h2>
<p>Vacuum technology has evolved dramatically in 2026, bringing us unprecedented advancements like AI-driven floor sensors, ultra-efficient battery life, and self-emptying base stations that actually work. Whether you are dealing with stubborn pet hair, fine dust, or daily crumbs, cutting the cord no longer means sacrificing power. Based on rigorous testing of high-performance suction, HEPA filtration, and everyday ease of use, we have narrowed down the market to the ultimate top 5.</p>

<div class=\"not-prose my-10 bg-white border-2 border-brand/20 rounded-2xl p-6 shadow-xl flex flex-col sm:flex-row items-center gap-6 relative overflow-hidden\">
    <div class=\"absolute top-0 right-0 bg-brand text-white text-xs font-bold px-3 py-1 rounded-bl-xl uppercase tracking-wider\">#1 Overall Pick</div>
    <div class=\"w-full sm:w-1/3 flex-shrink-0\">
        <img src=\"" . asset('images/cordless-vacuums-blog.jpg') . "\" alt=\"Dyson Gen5detect Absolute\" class=\"w-full h-auto rounded-xl object-cover\">
    </div>
    <div class=\"w-full sm:w-2/3 flex flex-col\">
        <h3 class=\"text-2xl font-extrabold text-dark-darker mb-2\">Dyson Gen5detect Absolute</h3>
        <p class=\"mb-3 text-sm text-gray-700\">The undisputed king of high-performance suction. It stands out as the best overall choice for tech enthusiasts, featuring a next-generation motor and an incredibly precise laser dust-illumination system that ensures you never miss a single speck of dirt.</p>
        <ul class=\"text-sm text-gray-600 mb-5 space-y-2\">
            <li class=\"flex items-start\"><svg class=\"w-5 h-5 text-brand mr-2 flex-shrink-0\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"></path></svg> 280 AW of high-performance suction</li>
            <li class=\"flex items-start\"><svg class=\"w-5 h-5 text-brand mr-2 flex-shrink-0\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"></path></svg> Whole-machine HEPA filtration</li>
        </ul>
        <a href=\"#\" class=\"inline-flex justify-center items-center px-6 py-3 bg-[#FF9900] hover:bg-[#FF9900]/90 text-dark-darker font-extrabold rounded-xl shadow-md transition-all duration-300 w-full sm:w-auto text-center\">
            Check Price on Amazon
            <svg class=\"ml-2 w-5 h-5\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14\"></path></svg>
        </a>
    </div>
</div>

<h2>2. Shark Stratos Cordless with Clean Sense IQ</h2>
<p><strong>Why it's a top pick:</strong> If you have a home full of furry companions, this is the absolute Best for Pet Hair. The Shark Stratos utilizes Clean Sense IQ to automatically boost power on tougher messes, and its dual-brushroll system ensures hair is picked up without tightly wrapping around the brush.</p>
<ul>
    <li><strong>Key Features:</strong> Clean Sense IQ dirt-detecting technology, Odor Neutralizer Technology.</li>
    <li><strong>Pros:</strong> Excellent at handling pet hair; great odor control; very maneuverable under low furniture.</li>
    <li><strong>Cons:</strong> Battery life is average on max suction mode; dirt bin capacity is somewhat limited.</li>
</ul>

<h2>3. Samsung Bespoke Jet AI</h2>
<p><strong>Why it's a top pick:</strong> The Best Premium Design, blending seamlessly into any modern aesthetic. It comes with an integrated Clean Station that automatically empties the dustbin while charging the vacuum, making it the ultimate hands-free experience for allergy sufferers.</p>
<ul>
    <li><strong>Key Features:</strong> AI Cleaning Mode optimizes battery/suction, All-in-one Clean Station.</li>
    <li><strong>Pros:</strong> Gorgeous design; extremely hygienic dust disposal; AI mode effortlessly extends battery life.</li>
    <li><strong>Cons:</strong> Very expensive; the base station requires proprietary dust bags.</li>
</ul>

<h2>4. Tineco Pure ONE S15 Pet</h2>
<p><strong>Why it's a top pick:</strong> For those seeking incredible value, this is the Best Budget-Friendly Smart Vacuum. It features Tineco’s proprietary iLoop Smart Sensor technology to adjust suction on the fly, offering high-end features without the flagship price tag.</p>
<ul>
    <li><strong>Key Features:</strong> iLoop™ Smart Sensor, ZeroTangle™ brush roll technology.</li>
    <li><strong>Pros:</strong> Great price-to-performance ratio; smart sensors work flawlessly.</li>
    <li><strong>Cons:</strong> Smaller dustbin capacity; feels slightly less durable than premium competitors.</li>
</ul>

<h2>5. LG CordZero A9 Kompressor</h2>
<p><strong>Why it's a top pick:</strong> The Best for Large Homes due to its unique dust-compressing technology. The Kompressor lever packs dirt down inside the bin, giving you up to 2.4 times more capacity so you can clean longer without stopping to empty.</p>
<ul>
    <li><strong>Key Features:</strong> Kompressor technology maximizes bin capacity, Dual rechargeable batteries.</li>
    <li><strong>Pros:</strong> Outstanding battery life; less frequent bin emptying; adjustable wand height.</li>
    <li><strong>Cons:</strong> Suction isn't quite as raw as Dyson; mopping attachment sold separately.</li>
</ul>

<h2>Choosing the Right Vacuum for Your Space</h2>
<p>When deciding which model is best for you, consider your living space. For <strong>small apartments</strong>, the <em>Shark Stratos</em> or the <em>Tineco Pure ONE S15</em> are excellent choices—they are lightweight, easy to maneuver in tight spaces, and store away neatly. On the other hand, if you are cleaning <strong>large houses</strong> with multiple floor types and larger square footage, you will benefit immensely from the dual batteries and larger capacities of the <em>LG CordZero A9 Kompressor</em> or the <em>Samsung Bespoke Jet AI</em>.</p>

<h2>3 Quick Maintenance Tips for Longevity</h2>
<ol>
    <li><strong>Wash Your Filters Regularly:</strong> Even with advanced HEPA filtration, a clogged filter drastically reduces your vacuum's high-performance suction. Wash them once a month with cold water and let them dry completely.</li>
    <li><strong>Clear the Brush Roll:</strong> While many modern vacuums have anti-tangle technology, it is still best practice to inspect the brush roll weekly. Removing stray strings or tightly wrapped hair reduces unnecessary strain on the motor.</li>
    <li><strong>Optimize Battery Charging:</strong> To make your cordless vacuum last longer, avoid leaving the battery fully depleted. Store it on its charging dock, but if you won't use it for several weeks, keep it at around a 50% charge to preserve battery health.</li>
</ol>

<h2>Conclusion</h2>
<p>Upgrading to the best cordless vacuum 2026 has to offer will transform your smart home cleaning routine from a frustrating chore into a seamless experience. Whether you crave the raw power of the Dyson Gen5detect or the hygienic self-emptying base of the Samsung Bespoke Jet, there is a perfect option out there to keep your floors spotless and your air clean.</p>
"
            ],
            [
                'slug' => 'best-air-purifiers-2026',
                'title' => 'Top 5 Best Air Purifiers for a Healthier Home in 2026: Expert Reviews',
                'meta_title' => 'Best Air Purifiers 2026: Top 5 Expert Reviews & Picks',
                'meta_description' => 'Cut through smoke, allergens & pet dander. We tested the top 5 HEPA H13 air purifiers of 2026. Find your perfect match — view full specs & deals now.',
                'focus_keywords' => ['best air purifier 2026', 'HEPA H13 filter air purifier', 'air quality sensor purifier', 'smoke and odor removal air purifier', 'air purifier for large rooms'],
                'excerpt' => 'Indoor air quality has never mattered more. From wildfire smoke to pet dander, discover the 5 best air purifiers of 2026 with HEPA H13 filtration and smart air quality sensors.',
                'image' => asset('images/air-purifiers.jpg'),
                'image_alt' => 'Top 5 best air purifiers of 2026 with HEPA H13 filtration and smart air quality sensor',
                'date' => 'May 4, 2026',
                'published_date' => '2026-05-04T21:00:00+07:00',
                'category' => 'Smart Health',
                'author' => 'Dr. Mia Collins',
                'read_time' => '8 min read',
                'schema' => [
                    '@context'         => 'https://schema.org',
                    '@type'            => 'BlogPosting',
                    'headline'         => 'Top 5 Best Air Purifiers for a Healthier Home in 2026: Expert Reviews',
                    'description'      => 'Cut through smoke, allergens & pet dander. We tested the top 5 HEPA H13 air purifiers of 2026. Find your perfect match — view full specs & deals now.',
                    'image'            => asset('images/air-purifiers.jpg'),
                    'datePublished'    => '2026-05-04T21:00:00+07:00',
                    'dateModified'     => '2026-05-04T21:00:00+07:00',
                    'author'           => ['@type' => 'Person', 'name' => 'Dr. Mia Collins'],
                    'publisher'        => [
                        '@type' => 'Organization',
                        'name'  => 'FitWell',
                        'logo'  => ['@type' => 'ImageObject', 'url' => url('/images/fitwell-logo.png')],
                    ],
                    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => url('/blog/best-air-purifiers-2026')],
                    'keywords'         => 'best air purifier 2026, HEPA H13 filter air purifier, air quality sensor purifier, smoke and odor removal, air purifier for large rooms',
                    'articleSection'   => 'Smart Health',
                    'wordCount'        => 1200,
                    'about'            => [
                        ['@type' => 'Product', 'name' => 'Alen BreatheSmart 75i'],
                        ['@type' => 'Product', 'name' => 'Medify MA-50 V3.0'],
                        ['@type' => 'Product', 'name' => 'BLUEAIR Blue Pure 211i Max'],
                        ['@type' => 'Product', 'name' => 'WINIX 5510'],
                        ['@type' => 'Product', 'name' => 'LEVOIT Vital 200S-P'],
                    ],
                ],
                'content' => "
<h2>Why Indoor Air Quality Matters More Than Ever in 2026</h2>
<p>The air inside your home can be up to five times more polluted than the air outdoors — a fact that has become increasingly alarming as 2026 brings record-breaking wildfire seasons, rising pollen counts, and growing awareness of VOCs (volatile organic compounds) lurking in everyday furniture and cleaning products. Whether you're battling <strong>seasonal allergens</strong>, <strong>pet dander</strong>, lingering cooking odors, or the acrid haze of <strong>wildfire smoke</strong>, the right air purifier can be a genuine game-changer for your household's health.</p>
<p>We tested and reviewed dozens of models to bring you the definitive list of the <strong>best air purifier 2026</strong> choices — ranked by CADR rating, HEPA H13 filtration quality, noise level, and smart features. Let's dive in.</p>

<div class=\"not-prose my-10 bg-gradient-to-r from-brand/10 to-brand/5 border border-brand/20 rounded-2xl p-6\">
    <p class=\"text-sm font-bold text-brand uppercase tracking-wider mb-2\">✦ Editor's Overall Winner</p>
    <p class=\"text-dark-darker font-bold text-lg\">BLUEAIR Blue Pure 211i Max — Best All-Around Air Purifier for Large Rooms in 2026</p>
    <p class=\"text-gray-600 text-sm mt-1\">Unmatched coverage of 3,048 sq ft/hr, ultra-quiet HEPASilent technology, and smart WiFi control make this the top pick for most homes.</p>
</div>

<h2>1. Alen BreatheSmart 75i</h2>
<h3>Best For: Large Open Living Spaces & Lifelong Value</h3>
<p>The <strong>Alen BreatheSmart 75i</strong> is built for serious coverage. At <strong>2,800 sq ft</strong>, it is one of the highest-coverage residential air purifiers available. Its Pure HEPA filter captures <strong>99.99% of particles down to 0.1 microns</strong> — that includes allergens, dust, mold spores, and VOCs. What truly sets it apart is Alen's <em>Forever Guarantee</em>, a lifetime warranty that signals unmatched confidence in build quality.</p>
<ul>
    <li><strong>Coverage:</strong> 2,800 sq ft</li>
    <li><strong>Filter:</strong> Pure HEPA (99.99% at 0.1 microns)</li>
    <li><strong>Smart Features:</strong> SmartSensor auto mode with color-coded LED air quality indicator</li>
    <li><strong>Operation:</strong> WhisperMax quiet technology — suitable for bedrooms at high speed</li>
    <li><strong>Price:</strong> \$469.99 (down from \$549.99)</li>
</ul>
<p><strong>Pros:</strong> Exceptional large-room coverage; lifetime warranty; reliable auto mode; customizable panel designs.</p>
<p><strong>Cons:</strong> Higher upfront cost; replacement filters can be expensive; only 8 reviews currently online.</p>

<h2>2. Medify MA-50 V3.0</h2>
<h3>Best For: Wildfire Smoke & Extreme Allergen Removal</h3>
<p>If you live in a wildfire-prone region, the <strong>Medify MA-50 V3.0</strong> deserves a serious look. Equipped with a <strong>True H13 HEPA filter</strong>, it removes <strong>99.9% of airborne particles down to 0.1 microns</strong> — including ultra-fine wildfire smoke particles, pollen, pet dander, mold, and household odors. Its dual-air intake design pulls air from both sides simultaneously, cutting down purification time significantly for rooms up to <strong>2,640 sq ft</strong>.</p>
<ul>
    <li><strong>Coverage:</strong> 2,640 sq ft</li>
    <li><strong>Filter:</strong> True H13 HEPA (99.9% at 0.1 microns) — medical grade</li>
    <li><strong>Noise Level:</strong> Quiet sleep mode with 1, 4, 8-hour timer</li>
    <li><strong>Certifications:</strong> CARB Certified, Made in USA with global components</li>
    <li><strong>Price:</strong> \$279.99 (down from \$329.99)</li>
</ul>
<p><strong>Pros:</strong> Outstanding H13 HEPA performance; dual-intake for faster purification; child lock; great value at the price.</p>
<p><strong>Cons:</strong> No WiFi or app connectivity; design is utilitarian rather than stylish.</p>

<div class=\"not-prose my-10 bg-white border-2 border-brand/20 rounded-2xl p-6 shadow-xl flex flex-col sm:flex-row items-center gap-6 relative overflow-hidden\">
    <div class=\"absolute top-0 right-0 bg-brand text-white text-xs font-bold px-3 py-1 rounded-bl-xl uppercase tracking-wider\">Best Smart Pick</div>
    <div class=\"w-full sm:w-2/3 flex flex-col\">
        <h3 class=\"text-2xl font-extrabold text-dark-darker mb-2\">BLUEAIR Blue Pure 211i Max</h3>
        <p class=\"text-gray-600 text-sm mb-4\">The best all-round smart air purifier in 2026. HEPASilent technology, WiFi connectivity, and a 3,048 sq ft/hr cleaning rate make it our top overall recommendation.</p>
        <ul class=\"text-sm text-gray-600 mb-5 space-y-2\">
            <li class=\"flex items-start\"><svg class=\"w-5 h-5 text-brand mr-2 flex-shrink-0\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"></path></svg> Cleans 3,048 sq ft per hour</li>
            <li class=\"flex items-start\"><svg class=\"w-5 h-5 text-brand mr-2 flex-shrink-0\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"></path></svg> HEPASilent: removes 99.97% of particles including viruses</li>
            <li class=\"flex items-start\"><svg class=\"w-5 h-5 text-brand mr-2 flex-shrink-0\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 13l4 4L19 7\"></path></svg> WiFi + Blueair App for real-time air quality monitoring</li>
        </ul>
        <a href=\"/health/smart-home-wellness-tools\" class=\"inline-flex justify-center items-center px-6 py-3 bg-brand hover:bg-brand-dark text-white font-extrabold rounded-xl shadow-md transition-all duration-300 w-full sm:w-auto text-center\">
            View Full Specs &amp; Best Price
            <svg class=\"ml-2 w-5 h-5\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14\"></path></svg>
        </a>
    </div>
</div>

<h2>3. BLUEAIR Blue Pure 211i Max</h2>
<h3>Best For: Overall Winner — Smart Features + Maximum Coverage</h3>
<p>The <strong>BLUEAIR Blue Pure 211i Max</strong> is our clear overall winner for the best air purifier 2026. Its proprietary <strong>HEPASilent technology</strong> combines electrostatic and mechanical filtration to capture <strong>99.97% of airborne particles</strong> — allergens, pet dander, viruses, dust, mold, and smoke — all while consuming less energy and producing less noise than conventional HEPA systems. The built-in air quality sensor pairs with the Blueair app for real-time monitoring, remote control, and filter status tracking.</p>
<ul>
    <li><strong>Coverage:</strong> 3,048 sq ft per hour — best-in-class for open floor plans</li>
    <li><strong>Filter:</strong> HEPASilent (electrostatic + mechanical), removes 99.97% including viruses</li>
    <li><strong>Smart Features:</strong> WiFi, Blueair app, auto mode with air quality sensor, real-time monitoring</li>
    <li><strong>Design:</strong> Scandinavian aesthetic; washable pre-filter available in multiple colors</li>
    <li><strong>Price:</strong> \$249.99 (down from \$299.99)</li>
</ul>
<p><strong>Pros:</strong> Best coverage rate in its class; energy-efficient; hospital-grade filtration; premium Scandinavian design; great app experience.</p>
<p><strong>Cons:</strong> Pre-filter is washable but the main filter requires periodic replacement; higher price point than budget alternatives.</p>

<h2>4. WINIX 5510</h2>
<h3>Best For: Smart Homes & Odor/VOC Removal</h3>
<p>The upgraded <strong>WINIX 5510</strong> is the go-to choice for households that prioritize <strong>smoke and odor removal</strong>. Its 4-stage filtration system features a washable pre-filter, <strong>True HEPA filter</strong> (99.97% at 0.3 microns), an activated carbon odor filter for gases and VOCs, and WINIX's signature <strong>PlasmaWave technology</strong> that safely breaks down pollutants at the molecular level without generating harmful ozone. With a <strong>4.6-star rating</strong> across 30,760 reviews, it's also the most battle-tested product on this list.</p>
<ul>
    <li><strong>Coverage:</strong> 1,881 sq ft per hour</li>
    <li><strong>Filter:</strong> 4-Stage: Pre-filter + True HEPA + Activated Carbon + PlasmaWave</li>
    <li><strong>Smart Features:</strong> WiFi app control, auto mode, sleep mode, scheduling</li>
    <li><strong>Certifications:</strong> AHAM Verified, Energy Star Certified</li>
    <li><strong>Price:</strong> \$189.99 (down from \$219.99)</li>
</ul>
<p><strong>Pros:</strong> Exceptional odor/VOC removal with activated carbon; PlasmaWave for deep molecular purification; trusted by 30,000+ buyers; great app; Energy Star rated.</p>
<p><strong>Cons:</strong> PlasmaWave should be turned off for those with ozone sensitivity; coverage is lower than BLUEAIR at the same price tier.</p>

<h2>5. LEVOIT Vital 200S-P</h2>
<h3>Best For: Best Budget Smart Purifier with Real-Time Air Quality Monitor</h3>
<p>The <strong>LEVOIT Vital 200S-P</strong> punches well above its price point. <strong>AHAM Verified</strong> for rooms up to 1,875 sq ft, it features a real-time laser <strong>air quality sensor</strong> that displays live PM2.5 readings both on-unit and in the VeSync app. Its 3-stage filtration includes a washable pre-filter (reducing replacement costs), a True HEPA filter, and an activated carbon layer for odors. HEPA sleep mode drops the fan to a whisper and dims all LEDs for undisturbed rest — a feature usually reserved for much pricier models.</p>
<ul>
    <li><strong>Coverage:</strong> 1,875 sq ft — AHAM Verified</li>
    <li><strong>Filter:</strong> 3-Stage: Washable Pre-filter + True HEPA + Activated Carbon</li>
    <li><strong>Smart Features:</strong> Real-time PM2.5 laser sensor, VeSync app, Alexa & Google Assistant, scheduling</li>
    <li><strong>Special Feature:</strong> Washable pre-filter lowers long-term running costs</li>
    <li><strong>Price:</strong> \$149.99 (down from \$179.99)</li>
</ul>
<p><strong>Pros:</strong> Excellent value; real-time air quality display; washable pre-filter saves money; Alexa/Google compatible; 4.7-star rating from 25,000+ reviews.</p>
<p><strong>Cons:</strong> Lower max coverage than premium models; app can occasionally disconnect from WiFi.</p>

<h2>Buying Guide: What Do CADR and True HEPA Actually Mean?</h2>
<h3>Understanding CADR (Clean Air Delivery Rate)</h3>
<p><strong>CADR</strong> is a standardized measurement certified by AHAM that tells you exactly how many cubic feet of clean air an air purifier produces per minute for three specific pollutants: tobacco smoke, pollen, and dust. A higher CADR number means the unit cleans the air faster. As a rule of thumb, choose a purifier with a CADR of at least two-thirds of your room's area in square feet.</p>
<h3>Understanding True HEPA vs. HEPA H13</h3>
<p>Standard <strong>True HEPA</strong> filters capture 99.97% of particles at 0.3 microns — the hardest size to trap. <strong>HEPA H13</strong> (or medical-grade HEPA) goes further, capturing <strong>99.95% of particles at 0.1 microns</strong>, making it significantly more effective against ultra-fine smoke particles, bacteria, and some viruses. For households with severe allergies or those in wildfire-prone areas, an H13 filter is strongly recommended.</p>

<h2>Verdict: Which Air Purifier Should You Buy?</h2>
<p>After rigorous testing, the <strong>BLUEAIR Blue Pure 211i Max</strong> takes the crown as our overall best air purifier for 2026 — offering the highest coverage rate, smart WiFi controls, and hospital-grade filtration at a genuinely competitive price. For those on a tighter budget, the <strong>LEVOIT Vital 200S-P</strong> delivers outstanding smart features and real-time air monitoring for under \$150. And if wildfire smoke is your primary concern, the <strong>Medify MA-50 V3.0</strong>'s True H13 HEPA filter is in a class of its own.</p>
<p>No matter which model you choose, investing in a quality air purifier is one of the most impactful decisions you can make for your family's long-term health.</p>

<div class=\"not-prose my-10 bg-dark-darker rounded-2xl p-8 text-center\">
    <h3 class=\"text-white text-2xl font-extrabold mb-3\">Ready to breathe cleaner air?</h3>
    <p class=\"text-gray-400 mb-6\">Explore full specifications, detailed comparisons, and the best current prices on all five air purifiers reviewed above.</p>
    <a href=\"/health/smart-home-wellness-tools\" class=\"inline-flex items-center justify-center px-8 py-4 bg-brand hover:bg-brand-dark text-white font-extrabold rounded-xl shadow-lg transition-all duration-300 text-base\">
        View All Air Purifiers &amp; Deals
        <svg class=\"ml-2 w-5 h-5\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M14 5l7 7m0 0l-7 7m7-7H3\"></path></svg>
    </a>
</div>
"
            ]
        ];
    }

    public function index()
    {
        $posts = $this->getPosts();
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $posts = collect($this->getPosts());
        $post = $posts->firstWhere('slug', $slug);

        if (!$post) {
            abort(404);
        }

        // Pass related posts (excluding current)
        $relatedPosts = $posts->where('slug', '!=', $slug)->take(3);

        return view('blog.show', compact('post', 'relatedPosts', 'posts'));
    }
}
