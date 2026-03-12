# Hostinger VPS Deployment — SEVA SETU KENDRA

## Steps
1. Install PHP 8.2 + Nginx + MySQL.
2. Install Composer.
3. Clone GitHub repo.
4. Run `composer install`.
5. Run `php artisan migrate`.
6. Run `php artisan db:seed`.
7. Configure Nginx for `sevasetukendra.com`.

## Automated deployment
```bash
chmod +x scripts/deploy_hostinger.sh
./scripts/deploy_hostinger.sh https://github.com/your-org/seva-setu-kendra.git
```

## Post deployment
- Point DNS A record to VPS IP.
- Add SSL with Certbot.
- Setup queue worker + cron for scheduler.
