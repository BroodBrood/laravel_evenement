# Laravel Evenement Project - Deployment Guide

## Voorbereiding voor Upload

### 1. GitHub Repository Setup
```bash
# Voeg je GitHub repository als remote toe
git remote add origin https://github.com/BroodBrood/laravel_evenement.git

# Commit alle wijzigingen
git add .
git commit -m "Initial commit - Laravel Evenement project"

# Push naar GitHub
git push -u origin main
```

### 2. Bestanden voorbereiden voor Hosting

#### Bestanden die NIET geüpload moeten worden:
- `.env` (bevat gevoelige gegevens)
- `vendor/` (wordt opnieuw geïnstalleerd)
- `node_modules/` (wordt opnieuw geïnstalleerd)
- `storage/logs/` (wordt automatisch aangemaakt)
- `.git/` (Git repository data)

#### Bestanden die WEL geüpload moeten worden:
- Alle source code bestanden
- `composer.json` en `composer.lock`
- `package.json` en `package-lock.json`
- `artisan`
- Alle configuratie bestanden

## FileZilla Upload Stappen

### 1. Verbinding maken met je hosting
- Host: Je hosting provider (bijv. `ftp.jouwdomein.nl`)
- Gebruikersnaam: Je FTP gebruikersnaam
- Wachtwoord: Je FTP wachtwoord
- Poort: 21 (standaard FTP) of 22 (SFTP)

### 2. Bestanden uploaden
1. Ga naar de `public_html` of `www` directory op je hosting
2. Upload alle bestanden uit je Laravel project
3. **BELANGRIJK**: Zorg dat de `public/` directory de root wordt van je website

### 3. Directory structuur op hosting
```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/ (wordt geïnstalleerd)
├── .env (moet aangemaakt worden)
├── artisan
├── composer.json
└── public/ (deze wordt je website root)
```

## Na Upload Configuratie

### 1. Composer dependencies installeren
```bash
composer install --optimize-autoloader --no-dev
```

### 2. .env bestand aanmaken
```bash
cp .env.example .env
```

### 3. Application key genereren
```bash
php artisan key:generate
```

### 4. Database configuratie
- Update `.env` met je database gegevens
- Run migrations: `php artisan migrate`

### 5. Storage permissions
```bash
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

### 6. Cache optimalisatie
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## GitHub Repository

### Repository URL
https://github.com/BroodBrood/laravel_evenement

### Belangrijke bestanden voor GitHub
- Alle source code
- `composer.json` en `composer.lock`
- `package.json` en `package-lock.json`
- `.gitignore`
- `README.md`
- `DEPLOYMENT.md`

### Bestanden die NIET naar GitHub gaan
- `.env` (bevat gevoelige gegevens)
- `vendor/` (wordt geïnstalleerd via composer)
- `node_modules/` (wordt geïnstalleerd via npm)
- `storage/logs/` (log bestanden)
- `.git/` (Git repository data) 