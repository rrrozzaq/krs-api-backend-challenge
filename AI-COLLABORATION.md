# Dokumentasi Kolaborasi dengan AI (Gemini)

Proses pengembangan API KRS ini dibantu secara ekstensif oleh AI Gemini, yang berfungsi sebagai asisten teknis, debugger, dan generator dokumentasi. Kolaborasi ini mencerminkan proses belajar dan pemecahan masalah yang iteratif.

### Tahap 1: Inisiasi, Setup Proyek & Data Seeding
- **Analisis Kebutuhan**: AI membantu menerjemahkan *requirements* dan skema database menjadi struktur proyek Laravel yang konkret, termasuk menyarankan arsitektur Controller-Service-Model.
- **Pembuatan Migrasi & Model**: AI membantu mengonversi skema database yang kompleks menjadi file migrasi dan model Eloquent Laravel, lengkap dengan definisi relasi antar tabel.
- **Pembuatan Data Seeder**: Awalnya, AI membantu membuat seeder dari file CSV. Setelah ditemukan banyak inkonsistensi data, AI membantu membuat ulang seluruh data seeder secara manual dengan data sampel yang bersih, relasional, dan mencakup berbagai skenario pengujian.

### Tahap 2: Debugging Iteratif (Peran Kunci)
Ini adalah area di mana kontribusi AI paling signifikan. Proses pengembangan menghadapi serangkaian error yang diselesaikan secara bertahap:
1.  **Masalah Migrasi & Tipe Data**: AI membantu mendiagnosis dan memperbaiki serangkaian error migrasi (`Incorrect integer value`, `Integrity constraint violation`) dengan menyesuaikan tipe data (`UNSIGNED`) dan urutan kolom.
2.  **Masalah `Foreign Key`**: AI membantu mengidentifikasi bahwa data `nim_dinus` antara file-file CSV tidak konsisten, yang menjadi akar masalah dari banyak kegagalan seeder.
3.  **Silent Transaction Rollback**: AI membantu mendiagnosis masalah paling sulit di mana data tidak tersimpan meskipun API mengembalikan status sukses. AI menyediakan kode debugging dengan logging ekstensif untuk "memancing" error yang tersembunyi, yang akhirnya mengisolasi masalah pada interaksi `DB::transaction` di lingkungan pengembangan spesifik.
4.  **Perbedaan Versi Laravel**: AI mengoreksi instruksi yang salah terkait perintah (`make:config`, `make:service`) dan penempatan *middleware* di `__construct` Controller, menyesuaikannya dengan standar Laravel 11.
5.  **Masalah CORS & Scribe**: AI membantu mendiagnosis dan memperbaiki serangkaian error `Failed to fetch` dan `Unauthenticated` saat men-generate dokumentasi Scribe, dengan memberikan solusi konfigurasi yang tepat.

### Tahap 3: Implementasi Fitur & Finalisasi
- **Code Generation**: AI menyediakan kode lengkap untuk setiap lapisan aplikasi (Controller, Service, Validation Rules, API Resources) untuk kelima endpoint yang dibutuhkan.
- **Panduan**: AI membuat panduan langkah demi langkah untuk berbagai proses kompleks, termasuk:
    - Pengujian API menggunakan Postman.
    - Implementasi deployment lokal menggunakan XAMPP dan Docker (Laravel Sail).
    - Panduan konseptual untuk deployment live menggunakan Render & TiDB Cloud.
    - Pembuatan seluruh paket dokumentasi ini (`README.md`, `SOLUTION.md`, dll).
