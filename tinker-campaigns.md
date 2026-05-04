# Laravel Tinker — Seed Campaigns Table

Run `php artisan tinker` then paste the commands below.

---

## Option 1: Insert All Campaigns at Once

```php
use App\Models\Campaign;

$campaigns = [
    // --- Training products ---
    ['name' => 'Whey Protein',              'slug' => 'whey-protein',            'target_url' => 'https://www.amazon.com/dp/B000QSNYGI?tag=fitwell2026-20'],
    ['name' => 'Adjustable Dumbbells',       'slug' => 'dumbbells',              'target_url' => 'https://www.amazon.com/dp/B001ARYU58?tag=fitwell2026-20'],
    ['name' => 'Shaker Bottle',              'slug' => 'shaker-bottle',          'target_url' => 'https://www.amazon.com/dp/B01LZ0WQAS?tag=fitwell2026-20'],
    ['name' => 'Creatine Monohydrate',       'slug' => 'creatine',              'target_url' => 'https://www.amazon.com/dp/B002DYIZEO?tag=fitwell2026-20'],
    ['name' => 'BCAA Capsules',              'slug' => 'bcaa-capsules',          'target_url' => 'https://www.amazon.com/dp/B000GIQS02?tag=fitwell2026-20'],

    // --- Health products (from CSV) ---
    ['name' => 'ECOVACS T50 PRO Omni',       'slug' => 't50-pro-omni',          'target_url' => 'https://amzn.to/4dl0a0E'],
//    ['name' => 'ECOVACS T80S Omni',          'slug' => 't80s-omni',             'target_url' => 'https://www.amazon.com/dp/B0GHY7VT3Y?tag=fitwell2026-20'],
    ['name' => 'Bissell CleanView Pet',      'slug' => 'bissell-cleanview',     'target_url' => 'https://amzn.to/4296sKM'],
    ['name' => 'LEVOIT Core Mini-P',         'slug' => 'levoit-core-mini-p',    'target_url' => 'https://amzn.to/4neONuH'],
    ['name' => 'Afloia Air Purifier',        'slug' => 'afloia-air-purifier',   'target_url' => 'https://amzn.to/4uiYFWA'],
    ['name' => 'Bluevua ROPOT Water Filter', 'slug' => 'bluevua-ropot',         'target_url' => 'https://amzn.to/4cUT6Xm'],
    ['name' => 'BLACK+DECKER Coffee Maker',  'slug' => 'black-decker-coffee-maker', 'target_url' => 'https://amzn.to/3Rgk703'],
    ['name' => 'Roborock Q7 Max+',           'slug' => 'roborock-q7-max-plus',  'target_url' => 'https://amzn.to/4cK2xtT'],
    ['name' => 'Eufy RoboVac 11S MAX',       'slug' => 'eufy-robovac-11s-max',  'target_url' => 'https://amzn.to/3OSOQzI'],
    ['name' => 'Medify MA-25 Air Purifier',  'slug' => 'medify-ma-25',          'target_url' => 'https://amzn.to/3ODlTYv'],

    // --- Health products (from CSV Sheet1 v2) ---
    ['name' => 'Dreame X60 Max Ultra',       'slug' => 'dreame-x60-max-ultra',      'target_url' => 'https://amzn.to/4d3gNgj'],
    ['name' => 'Dreame Aqua10 Roller',       'slug' => 'dreame-aqua10-roller',      'target_url' => 'https://amzn.to/49dlR0j'],
    ['name' => 'Roborock Saros 10R',         'slug' => 'roborock-saros-10r',        'target_url' => 'https://amzn.to/427w4HR'],
    ['name' => 'BLUEAIR 211i Max',           'slug' => 'blueair-211i-max',          'target_url' => 'https://amzn.to/4tZm6UY'],
    ['name' => 'Alen BreatheSmart 75i',      'slug' => 'alen-breathesmart-75i',     'target_url' => 'https://amzn.to/3OF3Jph'],
    ['name' => 'WINIX 5510',                 'slug' => 'winix-5510',                'target_url' => 'https://amzn.to/4euVwhX'],
    ['name' => 'LEVOIT Vital 200S-P',        'slug' => 'levoit-vital-200s-p',       'target_url' => 'https://amzn.to/4n6cp4F'],
    ['name' => 'Medify MA-50 V3.0',          'slug' => 'medify-ma-50-v3',           'target_url' => 'https://amzn.to/4n6csxn'],

    // --- Training products (from CSV Sheet2) ---
    ['name' => 'Rule 1 R1 Whey Isolate',     'slug' => 'rule-1-r1-whey-isolate',    'target_url' => 'https://amzn.to/4n6Ox0Q'],
    ['name' => 'Mutant Hardcore Isolate',     'slug' => 'mutant-hardcore-isolate',    'target_url' => 'https://amzn.to/4n3AxF0'],
    ['name' => 'ON Platinum Hydrowhey',       'slug' => 'on-platinum-hydrowhey',      'target_url' => 'https://amzn.to/4w7qT8y'],
    ['name' => 'BPI Sports ISO HD',           'slug' => 'bpi-sports-iso-hd',          'target_url' => 'https://amzn.to/3OWzHgM'],
    ['name' => 'ON Gold Standard Vanilla 2lb','slug' => 'on-gold-standard-vanilla-2lb','target_url' => 'https://amzn.to/4d74zTX'],
    ['name' => 'Isopure Zero Carb',           'slug' => 'isopure-zero-carb',          'target_url' => 'https://amzn.to/42f5i0b'],
    ['name' => 'Vitargo Carb Powder',         'slug' => 'vitargo-carb-powder',        'target_url' => 'https://amzn.to/4cRQ8Ti'],
    ['name' => 'Nutrex IsoFit',               'slug' => 'nutrex-isofit',              'target_url' => 'https://amzn.to/4985gLk'],
    ['name' => 'Orgain Vegan Protein',        'slug' => 'orgain-vegan-protein',       'target_url' => 'https://amzn.to/3QX9O0P'],
    ['name' => 'ON Hydrowhey Chocolate',      'slug' => 'on-hydrowhey-chocolate',     'target_url' => 'https://amzn.to/49b5KAl'],
    ['name' => 'Sports Research Whey',        'slug' => 'sports-research-whey',       'target_url' => 'https://amzn.to/4n3o9EW'],
    ['name' => 'NAKED Whey Grass Fed',        'slug' => 'naked-whey-grass-fed',       'target_url' => 'https://amzn.to/4eXShQ4'],
    ['name' => 'SR Magtein Magnesium',        'slug' => 'sr-magtein-magnesium',       'target_url' => 'https://amzn.to/4w8tlLX'],
    ['name' => 'SR Vitamin D3 K2',            'slug' => 'sr-vitamin-d3-k2',           'target_url' => 'https://amzn.to/49866rs'],
];

foreach ($campaigns as $c) {
    Campaign::updateOrCreate(['slug' => $c['slug']], $c);
}

echo Campaign::count() . " campaigns created.\n";
```

---

## Option 2: Insert One by One (for testing)

```php
use App\Models\Campaign;

Campaign::create([
    'name'       => 'Whey Protein',
    'slug'       => 'whey-protein',
    'target_url' => 'https://www.amazon.com/dp/B000QSNYGI?tag=fitwell2026-20',
]);
```

---

## Verify Data

```php
use App\Models\Campaign;

// List all campaigns
Campaign::all(['id', 'name', 'slug'])->toArray();

// Check total count
Campaign::count();

// Find by slug (same logic as AffiliateController)
Campaign::where('slug', 'whey-protein')->first();
```

---

## Reset (Delete All & Re-seed)

```php
use App\Models\Campaign;

Campaign::truncate();
// Then re-run Option 1
```

---

## Notes

- The `slug` column matches the `{slug}` in route `/go/{slug}` (e.g. `/go/whey-protein`).
- Replace `tag=fitwell2026-20` with your actual Amazon Associates tag.
- `target_url` can point to any affiliate network (Amazon, ShareASale, CJ, etc.).
- `updateOrCreate` is used so you can safely re-run without duplicates.
