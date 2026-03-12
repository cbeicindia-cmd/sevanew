#!/usr/bin/env bash
set -euo pipefail

APP_DIR="/var/www/sevasetukendra"
DOMAIN="sevasetukendra.com"

sudo apt update
sudo apt install -y nginx mysql-server git unzip curl software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

sudo mkdir -p "$APP_DIR"
sudo chown -R "$USER":"$USER" "$APP_DIR"

git clone <YOUR_GITHUB_REPO_URL> "$APP_DIR"
cd "$APP_DIR"

composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan db:seed --class=SchemeSeeder --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo cp deploy/nginx.sevasetukendra.com.conf /etc/nginx/sites-available/$DOMAIN
sudo ln -sf /etc/nginx/sites-available/$DOMAIN /etc/nginx/sites-enabled/$DOMAIN
sudo nginx -t
sudo systemctl restart nginx php8.2-fpm

echo "Deployment complete for SEVA SETU KENDRA"
