#!/usr/bin/env bash
set -euo pipefail

APP_DIR="/var/www/seva-setu-kendra"
REPO_URL="https://github.com/your-org/seva-setu-kendra.git"
DOMAIN="sevasetukendra.com"

sudo apt update
sudo apt install -y nginx mysql-server git unzip curl software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-bcmath

if ! command -v composer >/dev/null 2>&1; then
  curl -sS https://getcomposer.org/installer | php
  sudo mv composer.phar /usr/local/bin/composer
fi

sudo mkdir -p "$APP_DIR"
sudo chown -R "$USER":"$USER" "$APP_DIR"

if [ ! -d "$APP_DIR/.git" ]; then
  git clone "$REPO_URL" "$APP_DIR"
else
  git -C "$APP_DIR" pull origin main
fi

cd "$APP_DIR"
cp .env.example .env || true
composer install --no-dev --optimize-autoloader
php artisan key:generate --force
php artisan migrate --force
php artisan db:seed --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo cp deploy/nginx/sevasetukendra.com.conf /etc/nginx/sites-available/sevasetukendra.com
sudo ln -sf /etc/nginx/sites-available/sevasetukendra.com /etc/nginx/sites-enabled/sevasetukendra.com
sudo nginx -t
sudo systemctl restart php8.2-fpm
sudo systemctl reload nginx

echo "Deployment complete for $DOMAIN"
