# SEVA SETU KENDRA

**Tagline:** Connecting Citizens with Government Opportunities

SEVA SETU KENDRA is a production-ready Laravel-style platform blueprint to connect citizens with government schemes through a managed agent network.

## Modules Included
- Multi-role authentication (Super Admin, Admin, Agent, Citizen)
- Agent onboarding with OTP/email/admin approval workflow
- Citizen portal for scheme search, eligibility checks, and tracking
- Government schemes dataset with 3000+ record seeder
- Application and commission systems
- Admin analytics dashboard
- AI recommendation engine (rule based + OpenAI-ready service layer)
- Hostinger VPS deployment script and Nginx config

## Project Structure
- `app/Models`: Core domain entities
- `app/Http/Controllers`: Admin, Agent, Citizen, and AI flows
- `app/Services`: Recommendation and commission services
- `database/migrations`: Schema definitions
- `database/seeders`: 3000+ schemes generator
- `resources/views`: Blade templates for dashboards and portals
- `scripts/deploy_hostinger.sh`: VPS setup/deploy automation
- `deploy/nginx.sevasetukendra.com.conf`: Nginx server config

## Quick Start
```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed --class=SchemeSeeder
php artisan serve
```

## AI Recommendation Flow
Use the endpoint `/api/recommendations` with profile payload:
- state
- income
- age
- gender
- category

The engine returns ranked schemes based on eligibility matching and can be extended to OpenAI function-calling.
