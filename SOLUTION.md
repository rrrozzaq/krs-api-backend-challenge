# Justifikasi Teknologi dan Arsitektur

Dokumen ini menjelaskan alasan di balik pemilihan teknologi dan desain arsitektur untuk proyek API KRS ini, dengan tujuan memenuhi kriteria evaluasi seperti kualitas kode, pemisahan tanggung jawab, dan penggunaan framework yang tepat.

## Pilihan Teknologi: Laravel Stack
Laravel dipilih sebagai framework utama karena ekosistemnya yang matang dan fitur-fitur modern yang secara signifikan mempercepat pengembangan API yang tangguh.
- **Eloquent ORM**: Menyediakan cara yang intuitif dan ekspresif untuk berinteraksi dengan database. Relasi antar model seperti `Mahasiswa`, `KrsRecord`, dan `JadwalTawar` dapat didefinisikan dengan mudah, membuat query menjadi lebih bersih dan terhindar dari N+1 problem melalui *eager loading*.
- **API Resources**: Fitur ini adalah cara standar Laravel untuk mentransformasi data model menjadi format JSON yang konsisten. Ini memastikan output API selalu seragam dan terpisah dari struktur database, sesuai dengan kriteria "Response format yang user-friendly".
- **Laravel Sanctum**: Solusi otentikasi berbasis token yang ringan, modern, dan aman untuk SPA maupun aplikasi mobile.
- **Validasi**: Kombinasi Form Requests dan Custom Rules memungkinkan pemisahan logika validasi dari controller secara bersih, membuat controller hanya fokus pada alur HTTP.

## Arsitektur: Controller -> Service -> Model
Arsitektur ini diadopsi untuk memenuhi prinsip **Separation of Concerns**, yang merupakan pilar dari kode berkualitas dan mudah dikelola:
- **Controller (`app/Http/Controllers`)**: Bertanggung jawab penuh untuk menangani siklus HTTP Request/Response. Dibuat "tipis" (*thin*) dan hanya bertugas sebagai jembatan antara rute dan logika bisnis.
- **Service (`app/Services`)**: Menjadi pusat semua logika bisnis (mengecek kuota, validasi jadwal, menghitung SKS, dll). Memisahkan logic ke dalam service membuat kode lebih bersih, mudah diuji secara terpisah (*unit testable*), dan dapat digunakan kembali (*reusable*) jika ada kebutuhan lain.
- **Model (`app/Models`)**: Merepresentasikan tabel database dan relasinya menggunakan Eloquent. Semua interaksi langsung dengan database terjadi di sini.

## Deployment: Docker & PaaS
- **Lokal (Docker via Laravel Sail)**: Sail dipilih sebagai metode utama untuk deployment lokal karena menyederhanakan proses penyiapan lingkungan pengembangan yang kompleks (PHP, Web Server, MySQL) ke dalam *container* yang terisolasi dan konsisten. Ini memastikan bahwa aplikasi berjalan di lingkungan yang sama bagi semua developer dan menghilangkan masalah "it works on my machine".
- **Live (PaaS via Render & Managed Database)**: Untuk deployment live, pendekatan menggunakan Platform-as-a-Service (PaaS) seperti Render direkomendasikan karena kemudahannya. Dipadukan dengan *managed database* seperti TiDB Cloud (MySQL-compatible), developer bisa fokus pada kode tanpa harus mengelola infrastruktur server secara mendalam.
