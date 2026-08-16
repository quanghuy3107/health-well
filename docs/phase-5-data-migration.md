# Phase 5: Data Migration (JSON → MongoDB)

## Tổng quan
Chuyển dữ liệu từ file JSON tĩnh và hardcode sang MongoDB, đồng thời giữ fallback để site vẫn chạy khi MongoDB chưa sẵn sàng.

## Artisan Command

```bash
# Migrate data vào MongoDB (không xóa dữ liệu cũ)
php artisan app:migrate-to-mongodb

# Fresh migrate (xóa collections rồi seed lại)
php artisan app:migrate-to-mongodb --fresh
```

**File:** `app/Console/Commands/MigrateToMongoDB.php`

## Quy trình deploy

```bash
# 1. Khởi động services
docker-compose up -d

# 2. Cài dependencies
docker exec laravel_app composer install

# 3. Migrate MariaDB (users, campaigns, clicks)
docker exec laravel_app php artisan migrate

# 4. Migrate MongoDB (products, blog, categories, settings)
docker exec laravel_app php artisan app:migrate-to-mongodb

# 5. (Hoặc) Seed tất cả cùng lúc
docker exec laravel_app php artisan db:seed
```

## Fallback Strategy

Controllers có try/catch để fallback về JSON khi MongoDB không khả dụng:

```php
try {
    $products = Product::active()->byCategory('health')->get()->toArray();
} catch (\Exception $e) {
    $products = $this->getProductsFromJson('health');
}
```

Điều này đảm bảo:
- Site vẫn chạy bình thường trước khi cài MongoDB
- Không downtime khi MongoDB restart
- Development có thể chạy mà không cần Docker

## Quy chuẩn khi phát triển

### Thêm dữ liệu mặc định mới
1. Tạo Seeder mới: `database/seeders/MongoXxxSeeder.php`
2. Dùng `updateOrCreate` (idempotent)
3. Thêm vào `DatabaseSeeder::run()` và `MigrateToMongoDB` command

### Dữ liệu source cũ
- `storage/app/products.json` — GIỮ LẠI làm fallback + backup
- `BlogController hardcode` — ĐÃ XÓA, thay bằng MongoDB

### Khi thêm collection mới
1. Tạo Model MongoDB
2. Tạo Seeder
3. Thêm drop logic vào `MigrateToMongoDB --fresh`
4. Thêm count vào output table của command
