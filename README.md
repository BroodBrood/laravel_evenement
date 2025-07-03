# Laravel Evenement Project

Een Laravel applicatie voor het beheren van evenementen.

## 🚀 Features

- Evenementen beheer
- Evenement types
- Gebruikers authenticatie
- Responsive design
- Modern UI/UX

## 📋 Vereisten

- PHP 8.2 of hoger
- Composer
- MySQL/MariaDB
- Node.js & NPM (voor frontend assets)

## 🛠️ Installatie

### 1. Repository clonen
```bash
git clone https://github.com/BroodBrood/laravel_evenement.git
cd laravel_evenement
```

### 2. Dependencies installeren
```bash
composer install
npm install
```

### 3. Environment configuratie
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database configuratie
- Configureer je database instellingen in `.env`
- Run migrations:
```bash
php artisan migrate
```

### 5. Development server starten
```bash
php artisan serve
npm run dev
```

## 📁 Project Structuur

```
laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── EvenementController.php
│   │   ├── HomeController.php
│   │   └── Controller.php
│   └── Models/
│       ├── Evenement.php
│       ├── EvenementType.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── evenementen/
│       ├── layouts/
│       └── partials/
└── routes/
    └── web.php
```

## 🗄️ Database

### Migrations
- `create_users_table.php` - Gebruikers tabel
- `create_evenements_table.php` - Evenementen tabel
- `create_evenement_types_table.php` - Evenement types tabel
- `add_evenement_type_id_to_evenements_table.php` - Foreign key relatie

### Models
- `User` - Gebruiker model
- `Evenement` - Evenement model
- `EvenementType` - Evenement type model

## 🎨 Views

### Layouts
- `app.blade.php` - Hoofd layout template

### Pages
- `home.blade.php` - Homepage
- `about.blade.php` - Over pagina
- `evenementen/index.blade.php` - Evenementen overzicht
- `evenementen/show.blade.php` - Evenement detail pagina

### Partials
- `nav.blade.php` - Navigatie component

## 🔧 Routes

```php
// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Evenement routes
Route::get('/evenementen', [EvenementController::class, 'index'])->name('evenementen.index');
Route::get('/evenementen/{evenement}', [EvenementController::class, 'show'])->name('evenementen.show');
```

## 🚀 Deployment

### FileZilla Server Deployment

1. **Voorbereiding:**
   ```bash
   # Run het deployment script
   deploy_to_server.bat
   ```

2. **Upload naar server:**
   - Verbind met je FileZilla server
   - Upload alle bestanden naar `public_html/`
   - Zorg ervoor dat `.env` ook wordt geüpload

3. **Server configuratie:**
   ```bash
   # Op de server uitvoeren:
   php artisan key:generate
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   php artisan migrate --force
   php artisan storage:link
   ```

4. **Permissies instellen:**
   ```bash
   chmod -R 755 storage/
   chmod -R 755 bootstrap/cache/
   chmod -R 755 public/storage/
   ```

### GitHub Repository

1. **Repository initialiseren:**
   ```bash
   git init
   git add .
   git commit -m "Initial commit: Laravel Evenement project"
   git remote add origin https://github.com/BroodBrood/laravel_evenement.git
   git branch -M main
   git push -u origin main
   ```

2. **Automatische deployment:**
   - Configureer GitHub Secrets (FTP_SERVER, FTP_USERNAME, FTP_PASSWORD)
   - Bij elke push naar `main` wordt automatisch gedeployed

Zie [DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md) voor uitgebreide instructies.

## 🤝 Bijdragen

1. Fork het project
2. Maak een feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit je wijzigingen (`git commit -m 'Add some AmazingFeature'`)
4. Push naar de branch (`git push origin feature/AmazingFeature`)
5. Open een Pull Request

## 📝 Licentie

Dit project is gelicenseerd onder de MIT License.

## 👨‍💻 Auteur

**BroodBrood**
- GitHub: [@BroodBrood](https://github.com/BroodBrood)

## 🙏 Dankbetuiging

- Laravel Framework
- Bootstrap voor styling
- Alle contributors 