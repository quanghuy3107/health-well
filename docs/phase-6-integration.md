# Phase 6: Final Integration & Frontend Connection

## Tổng quan
Kết nối frontend views với MongoDB, thêm fallback, site settings global, và đảm bảo toàn bộ flow hoạt động end-to-end.

## Site Settings — Global Access

### AppServiceProvider
`app/Providers/AppServiceProvider.php` share một helper function `$siteSetting` cho tất cả views:

```blade
{{-- Sử dụng trong blade views --}}
{{ $siteSetting('site_name', 'HomeWellness') }}
{{ $siteSetting('contact_email', 'contact@example.com') }}
{{ $siteSetting('logo', '/images/logo.png') }}
```

### Cách sử dụng trong Controller
```php
use App\Models\SiteSetting;

$email = SiteSetting::getValue('contact_email', 'default@email.com');
```

## Frontend → MongoDB Flow

```
Browser Request
    │
    ▼
Route (web.php / admin.php)
    │
    ▼
Controller (try MongoDB → catch fallback JSON)
    │
    ▼
MongoDB Model (Product, BlogPost, Category)
    │
    ▼
Blade View ($product['key'] array access)
```

## Controllers đã cập nhật

| Controller | Đọc từ | Fallback |
|-----------|--------|----------|
| `PageController` (training, health, showProduct) | MongoDB | JSON file |
| `BlogController` (index, show) | MongoDB | 404 |
| `routes/web.php` landing | MongoDB | JSON file |
| Admin Controllers | MongoDB | Không fallback (admin yêu cầu MongoDB) |

## Session & Auth Config

| Config | Value | Lý do |
|--------|-------|-------|
| SESSION_DRIVER | redis | Fast, shared giữa requests |
| CACHE_STORE | database | MariaDB cache table |
| DB_CONNECTION | mysql | MariaDB cho users, campaigns, clicks |
| MongoDB | Riêng | Chỉ cho products, blog, categories, settings |

## Quy chuẩn khi phát triển

### Khi tạo feature mới đọc từ MongoDB
1. Luôn wrap trong try/catch nếu là public-facing
2. Admin routes KHÔNG cần fallback (MongoDB bắt buộc cho admin)
3. Sử dụng `->toArray()` trước khi pass vào view nếu view dùng `$item['key']`
4. Hoặc giữ Eloquent model nếu view dùng `$item->key`

### Array Access vs Object Access
- Views cũ (landing, product_detail, product_list) → dùng `$product['key']` (array)
- Views admin mới → dùng `$product->key` (object)
- Khi pass data: `->toArray()` cho views cũ, giữ nguyên model cho views admin

### SiteSetting Usage
```php
// Trong Controller
$logo = SiteSetting::getValue('logo');

// Trong Blade
{{ $siteSetting('site_name', 'Default') }}

// Cập nhật
SiteSetting::setValue('logo', '/images/new-logo.png');
```

### Thêm setting mới
1. Thêm vào `MongoSiteSettingSeeder` (với key, value, group, type, label)
2. Chạy `php artisan db:seed --class=MongoSiteSettingSeeder`
3. Sử dụng `SiteSetting::getValue('new_key')` trong code

## Checklist deployment

- [ ] Docker services running (app, nginx, mariadb, redis, mongodb)
- [ ] `composer install` chạy xong (mongodb/laravel-mongodb installed)
- [ ] `php artisan migrate` (MariaDB tables: users + role column)
- [ ] `php artisan app:migrate-to-mongodb` (MongoDB seeded)
- [ ] Admin user tồn tại (check qua `php artisan tinker`)
- [ ] Login tại `/login` thành công
- [ ] `/admin` accessible sau login
- [ ] Public pages vẫn load bình thường
- [ ] Mongo Express tại `:8081` có data
