# SEVA SETU KENDRA

**Tagline:** Connecting Citizens with Government Opportunities

SEVA SETU KENDRA is a production-ready Laravel 10 style platform blueprint for managing digital government scheme services through role-based workflows for Super Admins, Admins, Agents, and Citizens.

## Features
- Multi-role authentication model (Super Admin, Admin, Agent, Citizen)
- Agent onboarding with OTP/email/admin approval flow
- Citizen portal for scheme discovery and tracking
- Government schemes database with scalable seeder (3000+ records)
- Scheme application lifecycle management
- Commission engine (₹100 fee => ₹60 agent + ₹40 platform)
- Admin analytics dashboard and operational controls
- AI recommendation service (Python FastAPI + optional OpenAI)
- Hostinger VPS deployment automation (Laravel + Nginx)

## Project Structure
- `app/` Laravel-style domain logic (Models, Controllers, Services)
- `database/migrations` relational schema
- `database/seeders` bootstrap + 3000 schemes generator
- `resources/views` Blade + Tailwind UI templates
- `routes/web.php` role-isolated route map
- `ai/recommendation_api.py` AI recommendation API
- `scripts/deploy_hostinger.sh` production deployment script
- `deploy/nginx/sevasetukendra.com.conf` Nginx host config

## Quick Start (local)
1. Copy env file and set DB creds:
   - `cp .env.example .env`
2. Install dependencies:
   - `composer install`
   - `npm install && npm run build`
3. Run migrations and seeders:
   - `php artisan migrate --seed`
4. Start app:
   - `php artisan serve`

## AI API
Run FastAPI recommender:
```bash
cd ai
python3 -m venv .venv && source .venv/bin/activate
pip install -r requirements.txt
uvicorn recommendation_api:app --host 0.0.0.0 --port 8001
```

## Deployment
See `DEPLOYMENT.md` and run `scripts/deploy_hostinger.sh`.
