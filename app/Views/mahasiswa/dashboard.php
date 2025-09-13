<?= $this->extend('layout/mahasiswa_template') ?>

<?= $this->section('main-content') ?>

<h2 class="my-3 fw-bold">Dashboard Mahasiswa</h2>
<!-- Anggap $mahasiswa sudah di-pass dari controller -->
<?php $mahasiswa = ['nama_lengkap' => 'John Doe']; ?>
<h4>Selamat datang, <?= $mahasiswa['nama_lengkap'] ?>!</h4>
<p>Ini adalah halaman dasbor Anda. Silakan pilih menu di atas untuk navigasi.</p>

  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Mata Kuliah Diambil</h5>
            <table class="table table-borderless">
            <tr>
                <th>Jumlah Mata Kuliah:</th>
                <td>8</td>
            </tr>
              <tr>
                <th>Jumlah SKS:</th>
                <td>20</td>
            </tr>
            </table>
        <a href="#" class="btn btn-primary">Lihat Detail</a>
      </div>
    </div>
  </div>
<?= $this->endSection()?>
