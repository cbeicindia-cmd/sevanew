#!/usr/bin/env bash
set -euo pipefail

APP_DIR="${APP_DIR:-/var/www/sevasetukendra}"
DOMAIN="${DOMAIN:-sevasetukendra.com}"
REPO_URL="${REPO_URL:-}"
DRY_RUN="${DRY_RUN:-0}"
DEPLOY_USER="${DEPLOY_USER:-$(id -un)}"

run() {
    if [[ "$DRY_RUN" == "1" ]]; then
        echo "[dry-run] $*"
    else
        eval "$@"
    fi
}

if [[ -z "$REPO_URL" ]]; then
    echo "ERROR: Set REPO_URL before deployment. Example:"
    echo "  REPO_URL='https://github.com/your-org/seva-setu-kendra.git' bash scripts/deploy_hostinger.sh"
    exit 1
fi

run "sudo apt update"
run "sudo apt install -y nginx mysql-server git unzip curl software-properties-common"
run "sudo add-apt-repository ppa:ondrej/php -y"
run "sudo apt update"
run "sudo apt install -y php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip"

run "curl -sS https://getcomposer.org/installer | php"
run "sudo mv composer.phar /usr/local/bin/composer"

run "sudo mkdir -p '$APP_DIR'"
run "sudo chown -R '$DEPLOY_USER':'$DEPLOY_USER' '$APP_DIR'"

if [[ "$DRY_RUN" == "1" ]]; then
    run "git clone '$REPO_URL' '$APP_DIR'"
else
    if [[ -d "$APP_DIR/.git" ]]; then
        cd "$APP_DIR"
        run "git fetch --all"
        run "git reset --hard origin/main"
    else
        run "git clone '$REPO_URL' '$APP_DIR'"
        cd "$APP_DIR"
    fi
fi

if [[ "$DRY_RUN" != "1" ]]; then
    cd "$APP_DIR"
fi

run "composer install --no-dev --optimize-autoloader"
run "cp .env.example .env"
run "php artisan key:generate"
run "php artisan migrate --force"
run "php artisan db:seed --class=SchemeSeeder --force"
run "php artisan config:cache"
run "php artisan route:cache"
run "php artisan view:cache"

run "sudo cp deploy/nginx.sevasetukendra.com.conf /etc/nginx/sites-available/$DOMAIN"
run "sudo ln -sf /etc/nginx/sites-available/$DOMAIN /etc/nginx/sites-enabled/$DOMAIN"
run "sudo nginx -t"
run "sudo systemctl restart nginx php8.2-fpm"

echo "Deployment complete for SEVA SETU KENDRA"
