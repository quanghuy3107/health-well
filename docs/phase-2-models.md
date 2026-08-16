# Phase 2: MongoDB Models & Data Migration

## Tổng quan
Tạo các Eloquent Models sử dụng MongoDB để quản lý Products, Categories, Blog Posts, và Site Settings. Migrate dữ liệu từ file JSON và hardcode sang MongoDB.

## Models

### MongoDB Models (`$connection = 'mongodb'`)

| Model | Collection | File |
|-------|-----------|------|
| `Product` | `products` | `app/Models/Product.php` |
| `Category` | `categories` | `app/Models/Category.php` |
| `BlogPost` | `blog_posts` | `app/Models/BlogPost.php` |
| `SiteSetting` | `site_settings` | `app/Models/SiteSetting.php` |

### MariaDB Models (giữ nguyên)

| Model | Table | Thay đổi |
|-------|-------|----------|
| `User` | `users` | Thêm field `role` (admin/user) |
| `Campaign` | `campaigns` | Không thay đổi |
| `Click` | `clicks` | Không thay đổi |

## Schema chi tiết

### Product
```php
[
    'slug'                      => 'string|unique',
    'name'                      => 'string',
    'category_id'               => 'ObjectId (ref: categories)',
    'category'                  => 'string (slug: health|training)',
    'category_label'            => 'string',
    'image'                     => 'string (path)',
    'gallery_images'            => 'array<string>',
    'description'               => 'string (short)',
    'long_description'          => 'string (full HTML)',
    'original_price'            => 'string ($999.99)',
    'price'                     => 'string ($899.99)',
    'price_numeric'             => 'float',
    'discount_percentage'       => 'integer',
    'star_rating'               => 'float (0-5)',
    'review_count'              => 'integer',
    'affiliate_link'            => 'string (/go/slug)',
    'key_features'              => 'array<string>',
    'specifications'            => 'object {key: value}',
    'frequently_bought_together'=> 'array',
    'is_active'                 => 'boolean (default: true)',
    'sort_order'                => 'integer (default: 0)',
]
```

### Category
```php
[
    'name'              => 'string',
    'slug'              => 'string|unique',
    'description'       => 'string',
    'image'             => 'string (path)',
    'banner_image'      => 'string (path)',
    'banner_title'      => 'string',
    'banner_subtitle'   => 'string',
    'is_active'         => 'boolean (default: true)',
    'sort_order'        => 'integer',
]
```

### BlogPost
```php
[
    'slug'              => 'string|unique',
    'title'             => 'string',
    'meta_title'        => 'string',
    'meta_description'  => 'string',
    'focus_keywords'    => 'array<string>',
    'excerpt'           => 'string',
    'content'           => 'string (HTML)',
    'image'             => 'string (path)',
    'image_alt'         => 'string',
    'date'              => 'string (May 4, 2026)',
    'published_date'    => 'string (ISO 8601)',
    'category'          => 'string',
    'author'            => 'string',
    'read_time'         => 'string (6 min read)',
    'schema'            => 'object (JSON-LD)',
    'is_published'      => 'boolean (default: false)',
    'sort_order'        => 'integer',
]
```

### SiteSetting
```php
[
    'key'       => 'string|unique',
    'value'     => 'mixed',
    'group'     => 'string (general|contact|social|seo|footer)',
    'type'      => 'string (text|textarea|email|url|image)',
    'label'     => 'string (display name)',
]
```

## Scopes có sẵn

```php
Product::active()                   // where is_active = true
Product::byCategory('health')       // where category = 'health'
BlogPost::published()               // where is_published = true
BlogPost::byCategory('Smart Health')
Category::active()
```

## Helper Methods (SiteSetting)

```php
SiteSetting::getValue('site_name', 'Default');  // Lấy giá trị (cached 1h)
SiteSetting::setValue('site_name', 'New Name');  // Set + clear cache
SiteSetting::getAllGrouped();                    // Tất cả settings theo group
SiteSetting::clearCache();                      // Xóa toàn bộ cache
```

## Seeders

| Seeder | Mô tả |
|--------|--------|
| `MongoProductSeeder` | Import từ `storage/app/products.json` + tạo Categories |
| `MongoBlogSeeder` | Chuyển 2 blog posts hardcode → MongoDB |
| `MongoSiteSettingSeeder` | Tạo 17 settings mặc định |
| `DatabaseSeeder` | Tạo admin user + gọi tất cả seeders |

## Quy chuẩn khi phát triển

### Tạo Model mới cho MongoDB
1. Extend `MongoDB\Laravel\Eloquent\Model` (KHÔNG phải `Illuminate\Database\Eloquent\Model`)
2. Khai báo `protected $connection = 'mongodb';`
3. Khai báo `protected $collection = 'collection_name';`
4. Luôn định nghĩa `$fillable` đầy đủ
5. Sử dụng `$casts` cho arrays và booleans
6. Thêm scope `active()` nếu có field `is_active`

### Naming Convention
- Collection name: snake_case, số nhiều (`blog_posts`, `site_settings`)
- Slug field: luôn unique, dùng làm URL identifier
- Boolean fields: prefix `is_` (`is_active`, `is_published`)
- Sort field: `sort_order` (integer, 0 = đầu tiên)

### Data Migration
- Khi thêm dữ liệu mặc định → tạo Seeder riêng trong `database/seeders/`
- Dùng `updateOrCreate` trong seeder để tránh duplicate khi chạy lại
- Seeder MongoDB đặt tên prefix `Mongo` (VD: `MongoProductSeeder`)

## Chạy seed

```bash
# Migrate MariaDB tables
php artisan migrate

# Seed tất cả (MongoDB + MariaDB)
php artisan db:seed

# Seed riêng từng seeder
php artisan db:seed --class=MongoProductSeeder
php artisan db:seed --class=MongoBlogSeeder
php artisan db:seed --class=MongoSiteSettingSeeder
```

## Admin account mặc định
- Email: `admin@homewellnessforyou.com`
- Password: `password`
- Role: `admin`
