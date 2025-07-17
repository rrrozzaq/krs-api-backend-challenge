# API Sistem KRS (Kartu Rencana Studi)

Ini adalah implementasi REST API untuk sistem KRS sebagai bagian dari *Backend Developer Challenge*. API ini dibangun menggunakan Laravel 11 dengan arsitektur yang bersih dan skalabel, fokus pada fungsionalitas inti, penanganan error yang baik, dan kemudahan deployment.

## Fitur Utama
- ✅ **Otentikasi Mahasiswa**: Sistem login berbasis token menggunakan Laravel Sanctum.
- ✅ **KRS Overview**: `GET /api/v1/students/{nim}/krs/current` - Menampilkan KRS mahasiswa pada semester aktif.
- ✅ **Mata Kuliah Tersedia**: `GET /api/v1/students/{nim}/courses/available` - Menampilkan daftar mata kuliah yang bisa diambil dengan filter kelayakan (kuota, jadwal tabrakan, nilai prasyarat).
- ✅ **Registrasi KRS**: `POST /api/v1/students/{nim}/krs/courses` - Menambahkan mata kuliah ke KRS dengan validasi penuh.
- ✅ **Hapus Mata Kuliah**: `DELETE /api/v1/students/{nim}/krs/courses/{schedule_id}` - Menghapus mata kuliah dari KRS.
- ✅ **Status KRS**: `GET /api/v1/students/{nim}/krs/status` - Menampilkan rekap status validasi KRS, total SKS, dan IPS semester lalu.

## Teknologi yang Digunakan
- **Framework**: Laravel 11
- **Database**: MySQL
- **ORM**: Eloquent ORM
- **Authentication**: Laravel Sanctum (Token Based)
- **Deployment Lokal**: Docker (via Laravel Sail)
- **Deployment Live**: Render (Web Service) & TiDB Cloud (Database)
- **Dokumentasi API**: Scribe (Auto-generated)

---

## Panduan Instalasi & Deployment

### A. Instalasi Lokal (Docker - Cara Disarankan)
1.  **Clone Repository**: 
    ```bash
    git clone [https://github.com/](https://github.com/)[rrrozzaq]/krs-api.git
    cd krs-api
    ```
2.  **Copy Environment File**: 
    ```bash
    cp .env.example .env
    ```
3.  **Install Dependencies**: 
    ```bash
    composer install
    ```
4.  **Generate App Key**: 
    ```bash
    php artisan key:generate
    ```
5.  **Install Laravel Sail**: 
    ```bash
    php artisan sail:install 
    ```
    (Saat ditanya, pilih `mysql`)

6.  **Jalankan Container**: 
    ```bash
    # Untuk Windows (via WSL2) atau macOS/Linux
    ./vendor/bin/sail up -d
    ```
7.  **Jalankan Migrasi & Seeder**: 
    ```bash
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```
8.  **Selesai!** API dapat diakses di `http://localhost`.

### B. Instalasi Lokal (XAMPP - Alternatif)
1.  Pastikan XAMPP Anda berjalan (modul Apache & MySQL).
2.  Buat database baru di phpMyAdmin dengan nama `krs_api`.
3.  Salin ` .env.example` menjadi `.env` dan sesuaikan kredensial database:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=krs_api
    DB_USERNAME=root
    DB_PASSWORD=
    ```
4.  Jalankan `composer install` dan `php artisan key:generate`.
5.  Jalankan `php artisan config:clear`.
6.  Jalankan `php artisan migrate:fresh --seed`.
7.  Jalankan `php artisan serve`. API dapat diakses di `http://127.0.0.1:8000`.

---

## Dokumentasi & Pengujian API
- **Dokumentasi Lengkap**: Dokumentasi interaktif yang digenerate oleh Scribe dapat diakses di `[URL_API_ANDA]/docs`.
- **Pengujian**: Gunakan Postman atau sejenisnya.
    1.  Dapatkan Bearer Token dari endpoint `POST /api/v1/login` dengan body `nim` dan `password`.
    2.  Gunakan token tersebut di tab **Authorization -> Bearer Token** untuk mengakses endpoint lainnya.
