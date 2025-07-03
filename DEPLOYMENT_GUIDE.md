# Laravel Evenement Deployment Guide

## Voorbereiding voor FileZilla Server

### 1. .env bestand configureren

Maak een `.env` bestand aan in de root van je project met de volgende inhoud:

```env
APP_NAME="Laravel Evenement"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://jouw-domein.nl

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_evenement
DB_USERNAME=jouw_db_gebruiker
DB_PASSWORD=jouw_db_wachtwoord

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@jouw-domein.nl"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

### 2. Deployment stappen

1. **Run het deployment script:**
   ```bash
   deploy_to_server.bat
   ```

2. **Upload naar FileZilla server:**
   - Verbind met je FileZilla server
   - Upload alle bestanden naar de public_html directory
   - Zorg ervoor dat de `.env` file ook wordt geüpload

3. **Server configuratie:**
   - Zorg ervoor dat PHP 8.2+ is geïnstalleerd
   - Zorg ervoor dat Composer beschikbaar is
   - Zorg ervoor dat MySQL/MariaDB is geconfigureerd

4. **Permissies instellen:**
   ```bash
   chmod -R 755 storage/
   chmod -R 755 bootstrap/cache/
   chmod -R 755 public/storage/
   ```

5. **Laravel commands uitvoeren op server:**
   ```bash
   php artisan key:generate
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   php artisan migrate --force
   php artisan storage:link
   ```

## GitHub Repository Setup

### 1. Repository initialiseren

```bash
git init
git add .
git commit -m "Initial commit: Laravel Evenement project"
```

### 2. Remote repository toevoegen

```bash
git remote add origin https://github.com/BroodBrood/laravel_evenement.git
git branch -M main
git push -u origin main
```

### 3. .gitignore controle

Zorg ervoor dat de volgende bestanden NIET worden gecommit:
- `.env`
- `vendor/`
- `node_modules/`
- `storage/*.key`
- `.phpunit.cache`

### 4. Automatische deployment (optioneel)

Je kunt GitHub Actions gebruiken voor automatische deployment:

1. Maak een `.github/workflows/deploy.yml` bestand
2. Configureer SSH keys voor je server
3. Automatiseer de deployment bij elke push

## Troubleshooting

### Veelvoorkomende problemen:

1. **500 Internal Server Error:**
   - Controleer of de `.env` file correct is geconfigureerd
   - Controleer of de APP_KEY is gegenereerd
   - Controleer de permissies van storage/ en bootstrap/cache/

2. **Database connectie fout:**
   - Controleer de database credentials in `.env`
   - Zorg ervoor dat de database bestaat
   - Controleer of de database gebruiker de juiste rechten heeft

3. **Composer dependencies:**
   - Run `composer install --no-dev --optimize-autoloader` op de server
   - Zorg ervoor dat Composer beschikbaar is

4. **NPM build errors:**
   - Run `npm install && npm run build` lokaal
   - Upload de `public/build` directory naar de server

## Server Requirements

- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js (voor build process)
- Apache/Nginx met mod_rewrite enabled

## Security Checklist

- [ ] APP_DEBUG=false in productie
- [ ] Sterke database wachtwoorden
- [ ] HTTPS enabled
- [ ] Firewall geconfigureerd
- [ ] Regular backups
- [ ] SSL certificaat geïnstalleerd 