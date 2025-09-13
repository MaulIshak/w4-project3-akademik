<?= $this->extend('layout/mahasiswa_template') ?>

<?= $this->section('main-content') ?>

<h2 class="my-3 fw-bold">Dashboard Mahasiswa</h2>
<!-- Anggap $mahasiswa sudah di-pass dari controller -->
<?php $mahasiswa = ['nama_lengkap' => 'John Doe']; ?>
<h4>Selamat datang, <?= $mahasiswa['nama_lengkap'] ?>!</h4>
<p>Ini adalah halaman dasbor Anda. Silakan pilih menu di atas untuk navigasi.</p>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Total SKS Diambil</h5>
                <p class="card-text fs-1 fw-bold text-polban-primary">6</p>
                <a href="/mahasiswa/matakuliah" class="btn bg-polban-secondary text-white">Lihat Detail</a>
            </div>
        </div>
    </div>
     <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Profil Saya</h5>
                <p class="card-text fs-1 fw-bold text-polban-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </p>
                <a href="/mahasiswa/profile" class="btn bg-polban-secondary text-white">Ubah Profil</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection()?>
