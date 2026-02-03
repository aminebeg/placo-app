# PLATO PLATRE - LARAVEL INSTALLATION GUIDE

You selected to move everything to Laravel. Here is your complete project pack.

## 📦 Installation Steps

### 1. Create a New Laravel Project
Run this command in your terminal (outside this folder):

```bash
composer create-project laravel/laravel placo-app
```

### 2. Move Files
Copy ALL the contents of this `PLATO_LARAVEL_PROJECT` folder into your new `placo-app` folder.
Allow it to OVERWRITE any existing files (like routes/web.php or vite.config.js).

### 3. Install Dependencies
Go into your new project folder:

```bash
cd placo-app
npm install
```

### 4. Setup Database
1. Create a database (e.g., using MySQL/MariaDB or SQLite).
2. Edit the `.env` file in `placo-app` to configure your database connection.
3. Run the migrations:

```bash
php artisan migrate
```

### 5. Run the Project
You need two terminals:

**Terminal 1 (Backend):**
```bash
php artisan serve
```

**Terminal 2 (Frontend Builder):**
```bash
npm run dev
```

### 6. Access
Open your browser to: **http://localhost:8000**

## 🏗️ Project Structure
- `resources/js/` - Contains your React Application
- `routes/api.php` - Your Backend API Routes
- `app/Http/Controllers/Api/` - Your Backend Logic
- `resources/views/app.blade.php` - The main entry point

The React app communicates with the Laravel API automatically via `http://localhost:8000/api`.
