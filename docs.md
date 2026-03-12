# SEVA SETU KENDRA - Deployment Notes

1. Point domain A record to Hostinger VPS IP.
2. Run `bash scripts/deploy_hostinger.sh`.
3. Configure `.env` for MySQL credentials and APP_URL.
4. Install SSL with Certbot:
   - `sudo apt install certbot python3-certbot-nginx -y`
   - `sudo certbot --nginx -d sevasetukendra.com -d www.sevasetukendra.com`
5. Optional: run AI python service behind systemd + Nginx upstream.
