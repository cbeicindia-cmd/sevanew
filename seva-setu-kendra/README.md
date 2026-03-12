# SEVA SETU KENDRA

**Tagline:** Connecting Citizens with Government Opportunities

SEVA SETU KENDRA is a Laravel 10 platform that enables agents to help citizens discover and apply for government schemes.

## Stack
- Laravel 10 (Backend + Blade UI)
- TailwindCSS (UI)
- MySQL
- Laravel Breeze authentication
- Optional OpenAI/Python AI recommendation API
- Nginx + PHP-FPM for Hostinger VPS

## Core Modules
1. Multi-role auth (`super_admin`, `admin`, `agent`, `citizen`)
2. Agent onboarding with OTP/email/admin approval
3. Citizen portal for scheme search and tracking
4. 3000+ scheme dataset seeders
5. Agent-led application management
6. Commission ledger (₹100 fee split ₹60/₹40)
7. Admin analytics dashboard
8. AI recommendation engine
9. Hostinger deployment scripts and Nginx config

## Quick Start
```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Demo Credentials
Define users via seeders in `database/seeders/DatabaseSeeder.php`.

## Deployment
See `docs/hostinger-deployment.md` and `scripts/deploy_hostinger.sh`.
