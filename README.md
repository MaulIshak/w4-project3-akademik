# Sistem Akademik

Sistem Akademik Sederhana berbasis web yang dikembangkan menggunakan framework CodeIgniter 4 (CI4). Proyek ini mendemonstrasikan fitur-fitur dasar seperti manajemen data mahasiswa dan mata kuliah.

## Fitur

- **Manajemen Mahasiswa:** Tambah, edit, hapus, dan lihat data mahasiswa.
- **Manajemen Mata Kuliah:** Atur data mata kuliah yang tersedia.
- **Enroll Mata Kuliah:** Mahasiswa dappat mengambil beberapa mata kuliah yang tersedia.

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

## Tangkapan Layar

### Proses Login
* **Login Gagal (Invalid)**
    ![Login Gagal](screenshot/login-invalid.png)
* **Login Berhasil (Valid)**
    ![Login Berhasil](screenshot/login-valid.png)

### Dasbor
* **Dasbor Admin**
    ![Dasbor Admin](screenshot/dashboard-admin.png)
* **Dasbor Mahasiswa**
    ![Dasbor Mahasiswa](screenshot/dashboard-mahasiswa.png)

### Manajemen Mahasiswa (Admin)
* **Tabel Mahasiswa**
    ![Tabel Mahasiswa](screenshot/admin-tabel-mahasiswa.png)
* **Tambah Mahasiswa (Form Valid)**
    ![Tambah Mahasiswa Valid](screenshot/admin-tambah-mahasiswa-valid.png)
* **Tambah Mahasiswa (Form Invalid)**
    ![Tambah Mahasiswa Invalid](screenshot/admin-tambah-mahasiswa-invalid.png)
* **Tambah Mahasiswa (Sukses)**
    ![Tambah Mahasiswa Sukses](screenshot/admin-tambah-mahasiswa-sukses.png)
* **Modal Hapus Mahasiswa**
    ![Modal Hapus Mahasiswa](screenshot/admin-hapus-mahasiswa-modal.png)
* **Hapus Mahasiswa (Sukses)**
    ![Hapus Mahasiswa Sukses](screenshot/admin-hapus-mahasiswa-sukses.png)

### Manajemen Mata Kuliah (Admin)
* **Tambah Mata Kuliah (Form Valid)**
    ![Tambah Mata Kuliah Valid](screenshot/admin-tambah-matkul-valid.png)
* **Tambah Mata Kuliah (Form Invalid)**
    ![Tambah Mata Kuliah Invalid](screenshot/admin-tambah-matkul-invalid.png)
* **Tambah Mata Kuliah (Sukses)**
    ![Tambah Mata Kuliah Sukses](screenshot/admin-tambah-matkul-sukses.png)
* **Modal Hapus Mata Kuliah**
    ![Modal Hapus Mata Kuliah](screenshot/admin-hapus-matkul-modal.png)
* **Hapus Mata Kuliah (Sukses)**
    ![Hapus Mata Kuliah Sukses](screenshot/admin-hapus-matkul-sukses.png)

### Pengambilan Mata Kuliah (Mahasiswa)
* **Memilih Mata Kuliah untuk Diambil**
    ![Pilih Ambil Mata Kuliah](screenshot/mahasiswa-ambil-matkul-pilih.png)
* **Ambil Mata Kuliah (Sukses)**
    ![Ambil Mata Kuliah Sukses](screenshot/mahasiswa-ambil-matkul-sukses.png)
* **Memilih Mata Kuliah untuk Dibatalkan**
    ![Pilih Batal Mata Kuliah](screenshot/mahasiswa-batal-matkul-pilih.png)
* **Modal Batal Mata Kuliah**
    ![Modal Batal Mata Kuliah](screenshot/mahasiswa-batal-matkul-modal.png)
* **Batal Mata Kuliah (Sukses)**
    ![Batal Mata Kuliah Sukses](screenshot/mahasiswa-batal-matkul-sukses.png)

### Reset Password (Mahasiswa)
* **Reset Password (Form Valid)**
    ![Reset Password Valid](screenshot/mahasiswa-reset-password-valid.png)
* **Reset Password (Form Invalid)**
    ![Reset Password Invalid](screenshot/mahasiswa-reset-password-invalid.png)
* **Reset Password (Sukses)**
    ![Reset Password Sukses](screenshot/mahasiswa-reset-password-sukses.png)

## Lisensi

Proyek ini menggunakan lisensi MIT.
