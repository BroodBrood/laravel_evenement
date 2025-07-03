@echo off
echo ========================================
echo Laravel Evenement Deployment Script
echo ========================================

echo.
echo 1. Composer dependencies installeren...
call composer install --no-dev --optimize-autoloader

echo.
echo 2. NPM dependencies installeren en builden...
call npm install
call npm run build

echo.
echo 3. Laravel cache optimaliseren...
call php artisan config:cache
call php artisan route:cache
call php artisan view:cache

echo.
echo 4. Database migraties uitvoeren...
call php artisan migrate --force

echo.
echo 5. Storage link maken...
call php artisan storage:link

echo.
echo 6. Permissies instellen...
echo Zorg ervoor dat de volgende directories schrijfbaar zijn:
echo - storage/
echo - bootstrap/cache/
echo - public/storage/

echo.
echo ========================================
echo Deployment voltooid!
echo ========================================
echo.
echo Volgende stappen:
echo 1. Upload alle bestanden naar je FileZilla server
echo 2. Zorg ervoor dat de .env file correct is geconfigureerd
echo 3. Controleer of de database connectie werkt
echo 4. Test de applicatie
echo.
pause 