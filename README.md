# w4-project3-akademik

Sistem Akademik Sederhana berbasis web yang dikembangkan menggunakan framework CodeIgniter 4 (CI4). Proyek ini mendemonstrasikan fitur-fitur dasar seperti manajemen data mahasiswa, dosen, mata kuliah, dan nilai.

## Fitur

- **Manajemen Mahasiswa:** Tambah, edit, hapus, dan lihat data mahasiswa.
- **Manajemen Dosen:** Kelola data dosen, termasuk penambahan dan penghapusan.
- **Manajemen Mata Kuliah:** Atur data mata kuliah yang tersedia.
- **Pengelolaan Nilai:** Input dan update nilai mahasiswa untuk setiap mata kuliah.

## Teknologi yang Digunakan

- **CodeIgniter 4:** Framework PHP untuk pengembangan aplikasi web.
- **PHP:** Bahasa pemrograman utama.
- **MySQL:** Database untuk penyimpanan data.
- **Bootstrap:** Untuk tampilan antarmuka yang responsif.
- **Composer:** Manajemen dependensi PHP.

## Instalasi & Cara Menggunakan

1. **Clone Repository**
   ```
   git clone https://github.com/MaulIshak/w4-project3-akademik.git
   ```

2. **Masuk ke direktori proyek**
   ```
   cd w4-project3-akademik
   ```

3. **Install dependency dengan Composer**
   ```
   composer install
   ```

4. **Copy file environment**
   ```
   cp env .env
   ```
   Lalu, sesuaikan konfigurasi database di file `.env`.

5. **Buat database MySQL sesuai konfigurasi**
   ```
   CREATE DATABASE nama_database;
   ```

6. **Jalankan migrasi untuk membuat tabel-tabel yang diperlukan**
   ```
   php spark migrate
   ```

7. **Menjalankan aplikasi**
   ```
   php spark serve
   ```
   Akses aplikasi melalui browser di [http://localhost:8080](http://localhost:8080).

## Lisensi

Proyek ini menggunakan lisensi MIT.
