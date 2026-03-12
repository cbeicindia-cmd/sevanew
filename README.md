# SEVA SETU KENDRA

**Tagline:** Connecting Citizens with Government Opportunities

Production-ready Laravel 10 platform enabling admins and agents to help citizens discover and apply for government welfare schemes.

## Core Modules
- Multi-role authentication (`super_admin`, `admin`, `agent`, `citizen`)
- Agent onboarding with OTP + email verification + admin approval
- Citizen portal for scheme discovery, eligibility checks, and tracking
- Government scheme database with 3000+ seeded records
- Application workflow and status management
- Commission engine (₹100 fee split into ₹60 agent + ₹40 platform)
- Admin analytics dashboard and reporting
- AI recommendation engine (Laravel service + optional Python microservice)
- Hostinger VPS automated deployment script + Nginx config

## Stack
- Laravel 10 (PHP 8.2)
- Blade + TailwindCSS
- MySQL
- Laravel Breeze-compatible auth flows
- Optional OpenAI integration and Python FastAPI recommendation API

## Quick Start
```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Seed Data
`database/seeders/SchemeSeeder.php` generates 3000 realistic dummy schemes across states/categories/departments.

## Deployment
See `docs/hostinger-deployment.md` and run `scripts/deploy_hostinger.sh`.
