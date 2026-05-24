BarberQueue - Smart Queue System

Sistem antrean barbershop berbasis web yang dibuat untuk membantu pengelolaan antrean menjadi lebih tertata, transparan, dan efisien. Sistem ini menggunakan thermal printer untuk mencetak tiket antrean dan barcode scanner untuk memproses status antrean pelanggan.

Features
Ambil nomor antrean secara digital
Pilih layanan barbershop
Cetak barcode antrean menggunakan thermal printer
Scan barcode saat proses layanan
Update status antrean otomatis
Monitoring antrean secara real-time
Dashboard admin sederhana
Technologies Used
PHP
Laravel
MySQL
Bootstrap / Tailwind CSS
Thermal Printer
Barcode Scanner
Purpose

Project ini dibuat untuk membantu barbershop dalam mengelola antrean pelanggan agar lebih rapi, cepat, dan transparan serta mengurangi kesalahan maupun kecurangan dalam proses antrean.

Installation
git clone https://github.com/username/barberqueue.git
cd barberqueue
composer install
cp .env.example .env
php artisan key:generate

Atur database pada file .env