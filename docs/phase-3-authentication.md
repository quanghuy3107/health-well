# Phase 3: Authentication & Admin Authorization

## Tổng quan
Hệ thống đăng nhập/đăng ký và phân quyền admin cho ứng dụng. Sử dụng session-based auth (Laravel built-in) với MariaDB users table.

## Luồng hoạt động

```
┌─────────┐     ┌───────────┐     ┌──────────────┐     ┌─────────────────┐
│  Guest  │────▶│  /login   │────▶│ Auth Check   │────▶│ isAdmin()?      │
│         │     │  /register│     │              │     │                 │
└─────────┘     └───────────┘     └──────────────┘     └────────┬────────┘
                                                                 │
                                                    ┌────────────┼────────────┐
                                                    ▼                         ▼
                                            ┌──────────────┐        ┌────────────────┐
                                            │ /admin/*     │        │  / (public)    │
                                            │ Dashboard    │        │  Homepage      │
                                            └──────────────┘        └────────────────┘
```

## Files đã tạo

### Authentication
| File | Mô tả |
|------|--------|
| `app/Http/Controllers/Auth/LoginController.php` | Login + Logout logic |
| `app/Http/Controllers/Auth/RegisterController.php` | Đăng ký user mới |
| `resources/views/auth/login.blade.php` | Giao diện đăng nhập |
| `resources/views/auth/register.blade.php` | Giao diện đăng ký |
| `routes/auth.php` | Auth routes |

### Admin Middleware
| File | Mô tả |
|------|--------|
| `app/Http/Middleware/AdminMiddleware.php` | Check auth + role admin |
| `bootstrap/app.php` | Đăng ký middleware alias `admin` |

### Admin Controllers
| File | Quản lý |
|------|---------|
| `app/Http/Controllers/Admin/DashboardController.php` | Thống kê tổng quan |
| `app/Http/Controllers/Admin/ProductController.php` | CRUD sản phẩm (MongoDB) |
| `app/Http/Controllers/Admin/CategoryController.php` | CRUD danh mục (MongoDB) |
| `app/Http/Controllers/Admin/BlogPostController.php` | CRUD bài viết (MongoDB) |
| `app/Http/Controllers/Admin/UserController.php` | CRUD người dùng (MariaDB) |
| `app/Http/Controllers/Admin/CampaignController.php` | CRUD campaigns (MariaDB) |
| `app/Http/Controllers/Admin/SettingController.php` | Cấu hình website (MongoDB) |

### Routes
| File | Mô tả |
|------|--------|
| `routes/auth.php` | `/login`, `/register`, `/logout` |
| `routes/admin.php` | `/admin/*` — tất cả protected bởi `auth + admin` middleware |

## Route Map

### Auth Routes (public)
```
GET    /login              → LoginController@showLoginForm
POST   /login              → LoginController@login
GET    /register           → RegisterController@showRegistrationForm
POST   /register           → RegisterController@register
POST   /logout             → LoginController@logout
```

### Admin Routes (protected: auth + admin)
```
GET    /admin              → DashboardController@index

GET    /admin/products          → ProductController@index
GET    /admin/products/create   → ProductController@create
POST   /admin/products          → ProductController@store
GET    /admin/products/{id}/edit→ ProductController@edit
PUT    /admin/products/{id}     → ProductController@update
DELETE /admin/products/{id}     → ProductController@destroy

GET    /admin/categories        → (same CRUD pattern)
GET    /admin/blog              → (same CRUD pattern)
GET    /admin/users             → (same CRUD pattern)
GET    /admin/campaigns         → (same CRUD pattern)

GET    /admin/settings          → SettingController@index
POST   /admin/settings          → SettingController@update
```

## User Roles

| Role | Giá trị | Quyền |
|------|---------|-------|
| Admin | `admin` | Truy cập `/admin/*`, quản lý mọi thứ |
| User | `user` | Chỉ truy cập trang public |

## Quy chuẩn khi phát triển

### Thêm Route Admin mới
1. Tạo Controller trong `app/Http/Controllers/Admin/`
2. Thêm route vào `routes/admin.php` (đã có middleware group sẵn)
3. Sử dụng `Route::resource()` cho CRUD chuẩn
4. Route name prefix: `admin.` (VD: `admin.products.index`)

### Thêm Route Auth mới
1. Thêm vào `routes/auth.php`
2. Dùng middleware `guest` cho routes chỉ dành cho chưa đăng nhập
3. Dùng middleware `auth` cho routes yêu cầu đăng nhập

### Middleware
- `auth` — yêu cầu đăng nhập
- `guest` — chỉ cho phép chưa đăng nhập
- `admin` — yêu cầu đăng nhập + role = admin

### Controller Admin Convention
```php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class NewFeatureController extends Controller
{
    public function index()    { /* list */ }
    public function create()   { /* show form */ }
    public function store()    { /* save new */ }
    public function edit($id)  { /* show edit form */ }
    public function update($id){ /* save changes */ }
    public function destroy($id){ /* delete */ }
}
```

### Validation
- Validate trong Controller (không dùng Form Request cho đơn giản)
- MongoDB unique validation: `'slug' => 'unique:mongodb.collection_name,field'`
- MariaDB unique validation: `'email' => 'unique:users,email,' . $id`

### Flash Messages Convention
```php
return redirect()->route('admin.xxx.index')->with('success', 'Thành công.');
return back()->with('error', 'Thất bại.');
```

### Security Rules
- KHÔNG bao giờ cho user tự đổi role → chỉ admin mới thay đổi role user khác
- Admin KHÔNG thể xóa chính mình
- Logout phải invalidate session + regenerate token
- Password tối thiểu 8 ký tự

## Bootstrap/Loading

Routes được load trong `bootstrap/app.php`:
```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
    then: function () {
        Route::middleware('web')->group(base_path('routes/auth.php'));
        Route::middleware('web')->group(base_path('routes/admin.php'));
    },
)
```

Khi thêm file route mới, thêm vào closure `then:` tương tự.
