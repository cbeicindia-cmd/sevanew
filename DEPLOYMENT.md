# Hostinger VPS Deployment — SEVA SETU KENDRA

## Server prerequisites
- Ubuntu 22.04+
- Domain: `sevasetukendra.com`
- SSH user with sudo access

## Automated setup
```bash
chmod +x scripts/deploy_hostinger.sh
sudo ./scripts/deploy_hostinger.sh sevasetukendra.com /var/www/seva-setu-kendra
```

## Manual flow
1. Install PHP 8.2, Composer, Nginx, MySQL.
2. Clone repository to `/var/www/seva-setu-kendra`.
3. Run:
   - `composer install --no-dev --optimize-autoloader`
   - `cp .env.example .env`
   - `php artisan key:generate`
   - `php artisan migrate --force`
   - `php artisan db:seed --force`
4. Set permissions:
   - `chown -R www-data:www-data storage bootstrap/cache`
5. Configure nginx with `deploy/nginx/sevasetukendra.com.conf`.
6. Enable SSL (Let's Encrypt):
   - `certbot --nginx -d sevasetukendra.com -d www.sevasetukendra.com`

## Service hardening
- Enable `ufw` allowing 22/80/443
- Setup fail2ban
- Add MySQL backups (daily cron)
