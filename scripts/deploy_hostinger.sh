#!/usr/bin/env bash
set -euo pipefail

DOMAIN="${1:-sevasetukendra.com}"
APP_DIR="${2:-/var/www/seva-setu-kendra}"

apt update
apt install -y software-properties-common curl unzip git nginx mysql-server
add-apt-repository -y ppa:ondrej/php
apt update
apt install -y php8.2 php8.2-fpm php8.2-cli php8.2-mysql php8.2-curl php8.2-xml php8.2-mbstring php8.2-zip

if ! command -v composer >/dev/null 2>&1; then
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

if [ ! -d "$APP_DIR" ]; then
  git clone REPLACE_WITH_GITHUB_REPO "$APP_DIR"
fi

cd "$APP_DIR"
composer install --no-dev --optimize-autoloader
cp -n .env.example .env || true
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force

chown -R www-data:www-data storage bootstrap/cache

cp deploy/nginx/sevasetukendra.com.conf /etc/nginx/sites-available/${DOMAIN}.conf
sed -i "s/server_name .*/server_name ${DOMAIN} www.${DOMAIN};/" /etc/nginx/sites-available/${DOMAIN}.conf
ln -sf /etc/nginx/sites-available/${DOMAIN}.conf /etc/nginx/sites-enabled/${DOMAIN}.conf
nginx -t
systemctl restart nginx php8.2-fpm

echo "Deployment complete for ${DOMAIN}."
