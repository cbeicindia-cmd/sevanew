# SEVA SETU KENDRA - Deployment Notes

## Prerequisites
1. A Hostinger VPS running Ubuntu.
2. Domain A record pointed to VPS IP.
3. Git repository URL for this project.

## Test Before Deploy
Run all local checks:

```bash
bash scripts/test.sh
```

## Deployment
Use the deployment script with repository URL:

```bash
REPO_URL='https://github.com/your-org/seva-setu-kendra.git' bash scripts/deploy_hostinger.sh
```

### Dry Run (recommended first)

```bash
DRY_RUN=1 REPO_URL='https://github.com/your-org/seva-setu-kendra.git' bash scripts/deploy_hostinger.sh
```

## Post Deployment
1. Configure `.env` (MySQL credentials, mail, APP_URL).
2. Secure with SSL:
   - `sudo apt install certbot python3-certbot-nginx -y`
   - `sudo certbot --nginx -d sevasetukendra.com -d www.sevasetukendra.com`
3. Verify app:
   - `curl -I https://sevasetukendra.com`
