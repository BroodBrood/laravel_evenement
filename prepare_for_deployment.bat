@echo off
echo ========================================
echo Laravel Evenement - Deployment Preparation
echo ========================================
echo.

echo Creating deployment folder...
if exist "deployment" (
    echo Removing existing deployment folder...
    rmdir /s /q "deployment"
)

mkdir "deployment"
echo Deployment folder created successfully!
echo.

echo Copying project files...
xcopy /E /I /H /Y "app" "deployment\app"
xcopy /E /I /H /Y "bootstrap" "deployment\bootstrap"
xcopy /E /I /H /Y "config" "deployment\config"
xcopy /E /I /H /Y "database" "deployment\database"
xcopy /E /I /H /Y "resources" "deployment\resources"
xcopy /E /I /H /Y "routes" "deployment\routes"
xcopy /E /I /H /Y "storage" "deployment\storage"
xcopy /E /I /H /Y "public" "deployment\public"
copy "artisan" "deployment\"
copy "composer.json" "deployment\"
copy "composer.lock" "deployment\"
copy "package.json" "deployment\"
copy "package-lock.json" "deployment\"
copy "vite.config.js" "deployment\"
copy "phpunit.xml" "deployment\"
copy "README.md" "deployment\"
copy "DEPLOYMENT.md" "deployment\"
copy "DEPLOYMENT_CHECKLIST.md" "deployment\"
copy ".gitignore" "deployment\"
copy ".editorconfig" "deployment\"
copy ".gitattributes" "deployment\"
copy ".styleci.yml" "deployment\"
copy "CHANGELOG.md" "deployment\"

echo Files copied successfully!
echo.

echo Removing unnecessary files and folders...
if exist "deployment\storage\logs" rmdir /s /q "deployment\storage\logs"
if exist "deployment\storage\framework\cache" rmdir /s /q "deployment\storage\framework\cache"
if exist "deployment\storage\framework\sessions" rmdir /s /q "deployment\storage\framework\sessions"
if exist "deployment\storage\framework\testing" rmdir /s /q "deployment\storage\framework\testing"
if exist "deployment\storage\framework\views" rmdir /s /q "deployment\storage\framework\views"

echo Removing macOS metadata files...
del /s /q "deployment\*._*" 2>nul
for /d /r "deployment" %%d in (*) do del /s /q "%%d\*._*" 2>nul

echo Cleanup completed!
echo.

echo Creating .env.example file...
echo APP_NAME="Laravel Evenement" > "deployment\.env.example"
echo APP_ENV=production >> "deployment\.env.example"
echo APP_KEY= >> "deployment\.env.example"
echo APP_DEBUG=false >> "deployment\.env.example"
echo APP_URL=https://jouwdomein.nl >> "deployment\.env.example"
echo. >> "deployment\.env.example"
echo LOG_CHANNEL=stack >> "deployment\.env.example"
echo LOG_DEPRECATIONS_CHANNEL=null >> "deployment\.env.example"
echo LOG_LEVEL=debug >> "deployment\.env.example"
echo. >> "deployment\.env.example"
echo DB_CONNECTION=mysql >> "deployment\.env.example"
echo DB_HOST=localhost >> "deployment\.env.example"
echo DB_PORT=3306 >> "deployment\.env.example"
echo DB_DATABASE=jouw_database_naam >> "deployment\.env.example"
echo DB_USERNAME=jouw_database_gebruiker >> "deployment\.env.example"
echo DB_PASSWORD=jouw_database_wachtwoord >> "deployment\.env.example"
echo. >> "deployment\.env.example"
echo BROADCAST_DRIVER=log >> "deployment\.env.example"
echo CACHE_DRIVER=file >> "deployment\.env.example"
echo FILESYSTEM_DISK=local >> "deployment\.env.example"
echo QUEUE_CONNECTION=sync >> "deployment\.env.example"
echo SESSION_DRIVER=file >> "deployment\.env.example"
echo SESSION_LIFETIME=120 >> "deployment\.env.example"

echo .env.example file created!
echo.

echo ========================================
echo Deployment preparation completed!
echo ========================================
echo.
echo Your project is ready for FileZilla upload!
echo.
echo Next steps:
echo 1. Open FileZilla
echo 2. Connect to your hosting server
echo 3. Navigate to public_html directory
echo 4. Upload all files from the 'deployment' folder
echo 5. Follow the instructions in DEPLOYMENT_CHECKLIST.md
echo.
echo Deployment folder location: %CD%\deployment
echo.
pause 