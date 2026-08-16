# Phase 1: Infrastructure — Docker + MongoDB

## Tổng quan
Thêm MongoDB vào hệ thống Docker hiện có để thay thế việc lưu trữ dữ liệu bằng file JSON.

## Kiến trúc Docker

```
┌──────────────────────────────────────────────────────────┐
│  Docker Compose Services                                  │
│                                                           │
│  ┌─────────┐  ┌───────┐  ┌────────┐  ┌───────┐         │
│  │ PHP-FPM │  │ Nginx │  │MariaDB │  │ Redis │         │
│  │ 8.2     │  │ Alpine│  │ 10.11  │  │ Alpine│         │
│  └─────────┘  └───────┘  └────────┘  └───────┘         │
│                                                           │
│  ┌─────────┐  ┌──────────────┐                           │
│  │MongoDB 7│  │Mongo Express │                           │
│  │ :27017  │  │    :8081     │                           │
│  └─────────┘  └──────────────┘                           │
└──────────────────────────────────────────────────────────┘
```

## Files đã thay đổi

| File | Thay đổi |
|------|----------|
| `docker-compose.yml` | Thêm services: `mongodb`, `mongo-express`; volume: `mongo-data` |
| `docker/php/Dockerfile` | Thêm `openssl-dev`, PECL install `mongodb` extension |
| `config/database.php` | Thêm connection `mongodb` |
| `composer.json` | Thêm `mongodb/laravel-mongodb: ^5.0` |
| `bootstrap/providers.php` | Đăng ký `MongoDBServiceProvider` |
| `.env` / `.env.example` | Thêm `MONGO_*` variables |

## Biến môi trường MongoDB

```env
MONGO_HOST=mongodb          # Tên service trong docker-compose
MONGO_PORT=27017
MONGO_DATABASE=laravel
MONGO_USERNAME=admin
MONGO_PASSWORD=secret
MONGO_AUTH_SOURCE=admin
```

## Quy chuẩn khi phát triển

### Kết nối MongoDB
- Tất cả MongoDB models sử dụng `protected $connection = 'mongodb';`
- Không tự ý thay đổi `MONGO_AUTH_SOURCE`, luôn là `admin`
- Khi thêm database mới, tạo connection riêng trong `config/database.php`

### Docker
- Khi thêm PHP extension mới → sửa `docker/php/Dockerfile`
- Khi thêm service mới → sửa `docker-compose.yml`, thêm vào network `laravel`
- Volume data phải được khai báo ở cuối file dưới `volumes:`
- Container naming convention: `laravel_<service_name>`

### Ports đã sử dụng
| Port | Service |
|------|---------|
| 80 | Nginx (HTTP) |
| 443 | Nginx (HTTPS) |
| 27017 | MongoDB |
| 8081 | Mongo Express (UI) |
| 6379 | Redis (internal) |
| 3306 | MariaDB (internal) |

## Cách deploy

```bash
# Build lại container PHP (sau khi sửa Dockerfile)
docker-compose build app

# Khởi động tất cả services
docker-compose up -d

# Cài dependencies
docker exec laravel_app composer install

# Truy cập Mongo Express
http://localhost:8081
```
