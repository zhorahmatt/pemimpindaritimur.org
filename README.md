# Website GLP-INDTIM

**Graduate Leadership Program Indonesia Timur**

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Node.js](https://img.shields.io/badge/Node.js-339933?style=for-the-badge&logo=node.js&logoColor=white)
![npm](https://img.shields.io/badge/npm-CB3837?style=for-the-badge&logo=npm&logoColor=white)
![Inertia.js](https://img.shields.io/badge/Inertia.js-4A5568?style=for-the-badge&logo=inertia&logoColor=white)
![Vue 3](https://img.shields.io/badge/Vue-3-42B883?style=for-the-badge&logo=vue.js&logoColor=white)


---

## Persyaratan Sistem

Pastikan Anda memiliki versi berikut terinstal di sistem Anda:

-   **Composer:** `2.8.4`
-   **PHP:** `8.3.15`
-   **MySQL:** `8.0.30`
-   **Node.js** & **npm**

---

## Instalasi & Setup Project

Ikuti langkah-langkah mudah ini untuk menjalankan proyek secara lokal:

1.  **Clone Repositori**

    Pertama, clone repository ini ke mesin lokal Anda:

    ```bash
    git clone [https://github.com/Afila-Media-Karya/glp-indtim.git]
    ```

2.  **Instal Dependensi**

    Masuk ke folder proyek yang telah Anda clone dan instal dependensi PHP dengan Composer serta dependensi frontend dengan npm:
    
    ```bash
    composer install
    npm install
    ```

3.  **Siapkan Konfigurasi:**

    Salin file `.env.example` menjadi `.env` dan buat key aplikasi:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    **Penting:** Edit file `.env` dan atur detail koneksi database Anda (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`). Pastikan database yang Anda tentukan sudah dibuat di MySQL.

5.  **Migrasi Database dan Seed Data:**

    Jalankan perintah berikut untuk menyiapkan struktur tabel di database dan mengisi data awal:
    
    ```bash
    php artisan migrate:fresh --seed
    ```

    Perintah ini akan menghapus semua tabel yang ada, melakukan migrasi ulang, dan mengisi data awal yang telah dikonfigurasi.

6.  **Optimalkan Aplikasi:**

    Setelah migrasi dan seeding selesai, jalankan perintah berikut untuk mengoptimalkan aplikasi Laravel:

    ```bash
    php artisan optimize
    ```

    Perintah ini akan membersihkan dan mempercepat berbagai cache yang digunakan oleh Laravel, termasuk cache konfigurasi, rute, dan view.

7.  **Buat Storage Link:**

    Jalankan perintah berikut untuk membuat symbolic link ke folder `public/storage`:

    ```bash
    php artisan storage:link
    ```

8.  **Menjalankan Development Server:**

    Setelah semua dependensi terinstal, jalankan server pengembangan untuk frontend:

    ```bash
    npm run dev
    ```

    Aplikasi sekarang akan berjalan di `http://localhost:3000` dan akan terhubung ke backend Laravel yang berjalan di `http://127.0.0.1:8000`.

9.  **Jalankan Aplikasi Laravel:**

    Setelah frontend siap, jalankan aplikasi Laravel dengan perintah artisan:

    ```bash
    php artisan serve
    ```
    
    Aplikasi Laravel Anda sekarang berjalan di `http://127.0.0.1:8000` dan frontend di `http://localhost:3000`.

---
