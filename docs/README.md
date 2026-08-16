# Admin Panel — Tài liệu phát triển

## Tổng quan dự án

HomeWellness Admin Panel — Hệ thống quản trị cho website affiliate marketing/product review.

**Tech Stack:**
- Laravel 12 (PHP 8.2)
- MongoDB 7 (products, blog, categories, settings)
- MariaDB 10.11 (users, campaigns, clicks)
- Redis (session, cache)
- Tailwind CSS + Alpine.js (admin UI)
- Docker Compose (tất cả services)

## Tài liệu theo Phase

| Phase | File | Nội dung |
|-------|------|----------|
| 1 | [phase-1-infrastructure.md](./phase-1-infrastructure.md) | Docker, MongoDB setup, PHP extensions, ports |
| 2 | [phase-2-models.md](./phase-2-models.md) | MongoDB Models, Schema, Seeders |
| 3 | [phase-3-authentication.md](./phase-3-authentication.md) | Auth, Middleware, Admin routes, Controllers |
| 4 | [phase-4-admin-views.md](./phase-4-admin-views.md) | Blade views, Layout, CSS conventions |
| 5 | [phase-5-data-migration.md](./phase-5-data-migration.md) | JSON→MongoDB migration, Artisan command |
| 6 | [phase-6-integration.md](./phase-6-integration.md) | Frontend connection, SiteSettings, Fallback |

## Quick Start

```bash
# 1. Start docker services
docker-compose up -d

# 2. Install PHP dependencies
docker exec laravel_app composer install

# 3. Run MariaDB migrations
docker exec laravel_app php artisan migrate

# 4. Seed all data (admin user + MongoDB data)
docker exec laravel_app php artisan db:seed

# 5. Access
# Site:         http://localhost
# Admin:        http://localhost/admin
# Mongo Express: http://localhost:8081
```

## Admin Credentials

| Email | Password | Role |
|-------|----------|------|
| admin@homewellnessforyou.com | password | admin |
| test@example.com | password | user |

## Architecture

```
┌─────────────────────────────────────────────────────────┐
│  Docker Compose                                          │
│                                                          │
│  ┌───────────┐  ┌───────┐  ┌────────┐  ┌─────────────┐│
│  │ PHP 8.2   │  │ Nginx │  │MariaDB │  │  MongoDB 7  ││
│  │ + MongoDB │  │ :80   │  │ :3306  │  │   :27017    ││
│  │   ext     │  │ :443  │  │        │  │             ││
│  └───────────┘  └───────┘  └────────┘  └─────────────┘│
│                                                          │
│  ┌─────────────┐  ┌───────────────────┐                │
│  │ Redis       │  │ Mongo Express     │                │
│  │ :6379       │  │ :8081             │                │
│  └─────────────┘  └───────────────────┘                │
└─────────────────────────────────────────────────────────┘
```

## Database Design

```
MariaDB                          MongoDB
┌──────────┐                     ┌──────────────┐
│ users    │                     │ products     │
│ - role   │                     │ - 40+ fields │
├──────────┤                     ├──────────────┤
│campaigns │                     │ categories   │
│ - slug   │                     │ - banner_*   │
├──────────┤                     ├──────────────┤
│ clicks   │                     │ blog_posts   │
│ - uuid   │                     │ - content    │
└──────────┘                     ├──────────────┤
                                 │site_settings │
                                 │ - key/value  │
                                 └──────────────┘
```

## Quy chuẩn chung

### Naming
- Controllers: `PascalCase` + `Controller` suffix
- Models: `PascalCase` singular
- Routes: `snake_case` with dot notation (`admin.products.index`)
- Views: `snake_case` folders, `snake_case.blade.php` files
- MongoDB collections: `snake_case` plural

### Code Style
- Validate trong Controller (không Form Request)
- Flash messages: `success` hoặc `error`
- Delete: always confirm
- MongoDB models: extend `MongoDB\Laravel\Eloquent\Model`
- MariaDB models: extend `Illuminate\Database\Eloquent\Model`

### Git Workflow
- Feature branch → PR → merge to main
- Commit messages tiếng Việt OK
- Không commit `.env`, `vendor/`, `node_modules/`
