#!/bin/bash
# Script to initialize SSL certificates with Let's Encrypt
# Run this ONCE on your production server

set -e

DOMAIN="dailysharkfinds.com"
EMAIL="huyp3172004@gmail.com"

echo "=== Step 1: Creating temporary Nginx config (HTTP only) ==="

# Backup the SSL config
cp docker/nginx/default.conf docker/nginx/default.conf.ssl

# Create temporary HTTP-only config for initial certificate request
cat > docker/nginx/default.conf << 'EOF'
server {
    listen 80;
    server_name dailysharkfinds.com www.dailysharkfinds.com;
    root /var/www/html/public;
    index index.php index.html index.htm;

    client_max_body_size 20M;

    location /.well-known/acme-challenge/ {
        root /var/www/certbot;
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
EOF

echo "=== Step 2: Starting Nginx with HTTP only ==="
docker compose up -d nginx

echo "=== Step 3: Requesting SSL certificate ==="
docker compose run --rm certbot certonly \
    --webroot \
    --webroot-path=/var/www/certbot \
    --email "$EMAIL" \
    --agree-tos \
    --no-eff-email \
    -d "$DOMAIN" \
    -d "www.$DOMAIN"

echo "=== Step 4: Restoring SSL Nginx config ==="
cp docker/nginx/default.conf.ssl docker/nginx/default.conf
rm docker/nginx/default.conf.ssl

echo "=== Step 5: Restarting Nginx with SSL ==="
docker compose restart nginx

echo "=== Done! SSL certificate installed successfully ==="
echo "Visit https://$DOMAIN to verify"
