# Hostinger VPS Deployment Guide - SEVA SETU KENDRA

## 1) Provision VPS
- Ubuntu 22.04+
- Attach domain `sevasetukendra.com` DNS A record to server IP.

## 2) Run deployment script
```bash
chmod +x scripts/deploy_hostinger.sh
./scripts/deploy_hostinger.sh
```

## 3) What the script does
1. Installs PHP 8.2 + required extensions
2. Installs Composer
3. Clones GitHub repository
4. Runs `composer install`
5. Executes `php artisan migrate`
6. Executes `php artisan db:seed`
7. Applies Nginx config and restarts services

## 4) SSL setup
After DNS propagation, install SSL:
```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d sevasetukendra.com -d www.sevasetukendra.com
```
