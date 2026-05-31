# 🍃 Testing MongoDB + Laravel v12

Proyek ini adalah contoh implementasi **Laravel v12** yang terkoneksi dengan **MongoDB** sebagai database utama, menggunakan package resmi [`mongodb/laravel-mongodb`](https://github.com/mongodb/laravel-mongodb).

---

## 📦 Tech Stack

| Komponen | Versi |
|---|---|
| PHP | ^8.2 |
| Laravel | ^12.0 |
| mongodb/laravel-mongodb | ^5.7 |
| MongoDB Server | 6.x / 7.x (disarankan) |
| Composer | 2.x |
| Node.js + NPM | (untuk assets) |

---

## ✅ Prasyarat — Wajib Diinstall Dulu

Sebelum menjalankan project ini, pastikan semua tools berikut sudah terinstall di komputermu.

### 1. 🐘 PHP 8.2+

Download PHP sesuai OS kamu:

- **Windows** → Download via [https://windows.php.net/download](https://windows.php.net/download) (pilih versi **8.2 Non Thread Safe x64**), atau lebih mudah pakai [XAMPP](https://www.apachefriends.org/) / [Laragon](https://laragon.org/)
- **Linux/Mac** → Install via package manager:

```bash
# Ubuntu/Debian
sudo apt install php8.2 php8.2-cli php8.2-curl php8.2-mbstring php8.2-xml php8.2-zip

# Mac (Homebrew)
brew install php@8.2
```

> ⚠️ Pastikan extension **MongoDB PHP Driver** (`ext-mongodb`) juga terinstall. Lihat langkah di bawah.

#### Install PHP MongoDB Extension

```bash
# Via PECL
pecl install mongodb

# Lalu tambahkan ke php.ini:
extension=mongodb
```

Cek apakah extension sudah aktif:
```bash
php -m | grep mongodb
```

---

### 2. 🎼 Composer 2.x

Composer adalah package manager untuk PHP.

- Download di: [https://getcomposer.org/download/](https://getcomposer.org/download/)
- Untuk Windows, download **Composer-Setup.exe**
- Untuk Linux/Mac:

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

Verifikasi instalasi:
```bash
composer --version
# Composer version 2.x.x
```

---

### 3. 🍃 MongoDB Server

Download MongoDB Community Server di:  
👉 [https://www.mongodb.com/try/download/community](https://www.mongodb.com/try/download/community)

Pilih versi **7.x (atau 6.x)** sesuai OS kamu, lalu ikuti wizard instalasinya.

Pastikan MongoDB berjalan:
```bash
# Linux
sudo systemctl start mongod
sudo systemctl status mongod

# Windows (jalankan sebagai service, atau lewat Services)
net start MongoDB
```

Default MongoDB berjalan di:
```
Host: 127.0.0.1
Port: 27017
```

---

### 4. 🧭 MongoDB Compass (GUI — Opsional tapi Disarankan)

MongoDB Compass adalah aplikasi GUI untuk melihat dan mengelola data MongoDB secara visual.

- Download di: [https://www.mongodb.com/try/download/compass](https://www.mongodb.com/try/download/compass)
- Setelah install, buka Compass dan koneksikan ke:

```
mongodb://localhost:27017
```

Dengan Compass, kamu bisa:
- Lihat semua database & collection
- Insert, update, delete dokumen
- Jalankan query langsung
- Lihat struktur dokumen secara visual

---

### 5. 📦 Node.js & NPM

Dibutuhkan untuk compile assets (Vite).

- Download di: [https://nodejs.org/](https://nodejs.org/) (pilih versi **LTS**)

Verifikasi:
```bash
node -v
npm -v
```

---

## 🚀 Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/SidiqFatuh187/Testing-MongoDB-Laravel-v12.git
cd Testing-MongoDB-Laravel-v12
```

### 2. Install Dependencies PHP

```bash
composer install
```

### 3. Install Dependencies Node

```bash
npm install
```

### 4. Buat File `.env`

```bash
cp .env.example .env
```

### 5. Generate App Key

```bash
php artisan key:generate
```

### 6. Konfigurasi MongoDB di `.env`

Buka file `.env`, lalu ubah konfigurasi database menjadi:

```env
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=nama_database_kamu
DB_USERNAME=
DB_PASSWORD=
```

> Jika MongoDB kamu tidak menggunakan autentikasi (default lokal), kosongkan saja `DB_USERNAME` dan `DB_PASSWORD`.

### 7. Jalankan Migration (jika ada)

```bash
php artisan migrate
```

### 8. Jalankan Server

```bash
php artisan serve
```

Akses di browser: [http://localhost:8000](http://localhost:8000)

### 9. (Opsional) Compile Assets

```bash
npm run dev
```

---

## 🗄️ Melihat Data via MongoDB Compass

Setelah aplikasi berjalan dan ada data masuk:

1. Buka **MongoDB Compass**
2. Klik **"New Connection"**
3. Masukkan URI: `mongodb://localhost:27017`
4. Klik **Connect**
5. Pilih database sesuai `DB_DATABASE` di `.env`
6. Klik collection yang ingin dilihat

---

## 🔧 Konfigurasi MongoDB di Laravel

Package yang digunakan: [`mongodb/laravel-mongodb ^5.7`](https://github.com/mongodb/laravel-mongodb)

Untuk menggunakan MongoDB di Model, extend dari class MongoDB:

```php
use MongoDB\Laravel\Eloquent\Model;

class User extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'users';
}
```

---

## ❓ Troubleshooting

**Error: `Class "MongoDB\Driver\Manager" not found`**  
→ PHP MongoDB extension belum terinstall. Jalankan `pecl install mongodb` dan aktifkan di `php.ini`.

**Error: `Connection refused` ke MongoDB**  
→ Pastikan service MongoDB sudah berjalan (`sudo systemctl start mongod`).

**Error: `No application encryption key has been specified`**  
→ Jalankan `php artisan key:generate`.

---

## 📄 Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
