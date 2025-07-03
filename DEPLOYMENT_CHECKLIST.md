# FileZilla Deployment Checklist

## ✅ Voorbereiding

### 1. GitHub Repository
- [x] Repository aangemaakt: https://github.com/BroodBrood/laravel_evenement
- [x] Code geüpload naar GitHub
- [x] README.md en DEPLOYMENT.md toegevoegd

### 2. Bestanden voorbereiden voor hosting
- [ ] Maak een kopie van je project folder
- [ ] Verwijder de volgende mappen/bestanden uit de kopie:
  - `vendor/` (wordt opnieuw geïnstalleerd)
  - `node_modules/` (wordt opnieuw geïnstalleerd)
  - `.git/` (Git repository data)
  - `.env` (bevat gevoelige gegevens)
  - `storage/logs/` (wordt automatisch aangemaakt)
  - Alle `._` bestanden (macOS metadata)

## 📁 FileZilla Upload Stappen

### 1. Verbinding maken
- [ ] Open FileZilla
- [ ] Voer je hosting gegevens in:
  - **Host**: Je hosting provider (bijv. `ftp.jouwdomein.nl`)
  - **Gebruikersnaam**: Je FTP gebruikersnaam
  - **Wachtwoord**: Je FTP wachtwoord
  - **Poort**: 21 (FTP) of 22 (SFTP)
- [ ] Klik op "Quickconnect"

### 2. Navigeer naar de juiste directory
- [ ] Ga naar `public_html` of `www` directory op je hosting
- [ ] Dit is de root van je website

### 3. Upload bestanden
- [ ] Sleep alle bestanden uit je voorbereide project folder naar de server
- [ ] **BELANGRIJK**: Zorg dat de `public/` directory de root wordt van je website

### 4. Directory structuur controleren
Na upload moet je structuur er zo uitzien:
```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── package-lock.json
└── public/ (deze wordt je website root)
```

## ⚙️ Na Upload Configuratie

### 1. SSH toegang (indien beschikbaar)
```bash
# Ga naar je project directory
cd public_html

# Composer dependencies installeren
composer install --optimize-autoloader --no-dev

# .env bestand aanmaken
cp .env.example .env

# Application key genereren
php artisan key:generate

# Database configuratie
# Update .env met je database gegevens
php artisan migrate

# Storage permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Cache optimalisatie
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. .env bestand configureren
```env
APP_NAME="Laravel Evenement"
APP_ENV=production
APP_KEY=base64:... (wordt gegenereerd)
APP_DEBUG=false
APP_URL=https://jouwdomein.nl

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=jouw_database_naam
DB_USERNAME=jouw_database_gebruiker
DB_PASSWORD=jouw_database_wachtwoord
```

### 3. Database setup
- [ ] Maak een MySQL database aan via je hosting control panel
- [ ] Update de database gegevens in `.env`
- [ ] Run migrations: `php artisan migrate`

### 4. Permissions instellen
- [ ] `storage/` directory: 775
- [ ] `bootstrap/cache/` directory: 775
- [ ] `.env` bestand: 644

## 🔧 Alternatieve methoden

### Via Hosting Control Panel
Als je geen SSH toegang hebt:
1. Upload bestanden via FileZilla
2. Gebruik de hosting control panel voor:
   - Database aanmaken
   - Composer installeren
   - Permissions instellen

### Via Git (indien ondersteund)
```bash
# Clone repository direct op server
git clone https://github.com/BroodBrood/laravel_evenement.git
cd laravel_evenement
composer install --optimize-autoloader --no-dev
# Volg de rest van de configuratie stappen
```

## 🚨 Troubleshooting

### Veelvoorkomende problemen:
1. **500 Internal Server Error**: Controleer permissions en .env bestand
2. **Database connection error**: Controleer database gegevens in .env
3. **White screen**: Zet APP_DEBUG=true tijdelijk aan voor debugging
4. **Permission denied**: Controleer storage en cache directory permissions

### Debug stappen:
1. Check error logs in `storage/logs/`
2. Controleer .env configuratie
3. Test database verbinding
4. Controleer file permissions

## 📞 Support
- GitHub Issues: https://github.com/BroodBrood/laravel_evenement/issues
- Laravel Documentation: https://laravel.com/docs
- Hosting provider support 