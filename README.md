# Web Sisfo Skala Mikro

Aplikasi web PHP sederhana untuk manajemen data mahasiswa dengan implementasi enkripsi Vigenere Cipher pada data sensitif.

## Fitur

- Login dan logout session-based
- Register akun pengguna
- Tambah data mahasiswa
- Cari mahasiswa berdasarkan NIM
- Enkripsi/dekripsi data menggunakan Vigenere Cipher (`key = UTS`)
- UI sederhana dan lebih rapi (card layout + shared stylesheet)

## Teknologi

- PHP (native)
- MySQL / MariaDB
- HTML + CSS
- Laragon / XAMPP (lokal)

## Struktur File Utama

- `login.php`: halaman login
- `register.php`: halaman register
- `dashboard.php`: halaman utama setelah login
- `tambah_mahasiswa.php`: form tambah data mahasiswa
- `cari_mahasiswa.php`: pencarian data mahasiswa
- `logout.php`: proses keluar session
- `koneksi.php`: koneksi database
- `kriptografi.php`: fungsi enkripsi/dekripsi Vigenere
- `ui.css`: styling antarmuka

## Setup Lokal

1. Clone repository:

```bash
git clone https://github.com/ghostfaceeeeee/Web-Sisfo-Skala-Mikro.git
cd Web-Sisfo-Skala-Mikro
```

2. Pindahkan project ke folder web server lokal (contoh Laragon):

```text
C:\laragon\www\Web-Sisfo-Skala-Mikro
```

3. Buat database `uts_enkripsi` di MySQL.

4. Import schema minimal berikut:

```sql
CREATE DATABASE IF NOT EXISTS uts_enkripsi;
USE uts_enkripsi;

CREATE TABLE IF NOT EXISTS login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS mahasiswa (
    nim VARCHAR(30) PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    jurusan VARCHAR(100) NOT NULL
);
```

5. Pastikan konfigurasi di `koneksi.php` sesuai:

```php
$conn = mysqli_connect("localhost", "root", "", "uts_enkripsi");
```

6. Jalankan Apache + MySQL, lalu buka:

```text
http://localhost/Web-Sisfo-Skala-Mikro/login.php
```

## Catatan Enkripsi

- Implementasi enkripsi ada di `kriptografi.php`
- Key yang digunakan: `UTS`
- Field terenkripsi:
  - Tabel `login`: `password`, `email`
  - Tabel `mahasiswa`: `nama`, `alamat`
- Proses dekripsi dilakukan saat validasi login dan saat menampilkan data hasil pencarian.

## Author

Ghostface
