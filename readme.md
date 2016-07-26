# Project Monitoring

Buat file `.env` (atau lihat `.env.example`)

```
APP_ENV=local
APP_DEBUG=true
APP_KEY=

DB_HOST=localhost
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

1. `composer install`

2. `php artisan key:generate`

3. `php artisan migrate` / `php artisan migrate:refresh --seed`

4. `php artisan db:seed`

5. `php artisan serve`

6. Buka `http://localhost:8000/`

7. Login `admin@javan.co.id` `1234`


## Aturan Main

### Class Not Found
Jalankan `composer install`

### Migration & Seed
Tolong pelajari http://laravel.com/docs/5.1/migrations  

Setiap perubahan struktur database, harus pakai `Migration` ini (tidak boleh langsung edit database). Dan tidak boleh memperbaiki/edit file migration yang sudah ada / harus bikin baru.

