#!/bin/sh
set -e

# Cài đặt dependencies và build assets nếu chưa có manifest
if [ ! -f "public/build/manifest.json" ]; then
    echo "Vite manifest not found. Installing npm deps & building assets..."
    npm install --no-audit --no-fund
    npm run build
    echo "Vite build completed."
fi

# Chạy lệnh mặc định (php-fpm)
exec "$@"
