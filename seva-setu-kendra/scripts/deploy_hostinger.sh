#!/usr/bin/env bash
set -euo pipefail

APP_DIR=/var/www/sevasetukendra
REPO_URL=${1:-"https://github.com/your-org/seva-setu-kendra.git"}

echo "[1/8] Installing dependencies"
sudo apt update
sudo apt install -y nginx mysql-server unzip git curl software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2 php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-curl php8.2-zip

if ! command -v composer >/dev/null; then
  curl -sS https://getcomposer.org/installer | php
  sudo mv composer.phar /usr/local/bin/composer
fi

echo "[2/8] Cloning repository"
sudo mkdir -p "$APP_DIR"
sudo chown -R "$USER":"$USER" "$APP_DIR"
git clone "$REPO_URL" "$APP_DIR"
cd "$APP_DIR"

echo "[3/8] Laravel install"
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate


echo "[4/8] Database migrate + seed"
php artisan migrate --force
php artisan db:seed --force

echo "[5/8] Build optimizations"
php artisan config:cache
php artisan route:cache
php artisan view:cache


echo "[6/8] Permissions"
sudo chown -R www-data:www-data "$APP_DIR"
sudo chmod -R 775 storage bootstrap/cache

echo "[7/8] Nginx config"
sudo cp docs/nginx-sevasetukendra.conf /etc/nginx/sites-available/sevasetukendra
sudo ln -sf /etc/nginx/sites-available/sevasetukendra /etc/nginx/sites-enabled/sevasetukendra
sudo nginx -t
sudo systemctl restart nginx php8.2-fpm

echo "[8/8] Done"
echo "SEVA SETU KENDRA deployed successfully"
