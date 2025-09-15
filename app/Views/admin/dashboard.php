<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class=" my-3 mb-1 fw-bold">Dashboard Admin</h2>
<h1 class="">Selamat Datang <span class="text-success">Admin</span>!</h1>
<p class="text-secondary my-3 pb-3"> Berikut adalah ringkasan informasi akademik terkini. Silakan gunakan menu di atas untuk navigasi.</p>
 <!-- Content Row -->
<div class="row">
  <!-- Jumlah Mahasiswa Card -->
  <div class="col-xl-4 col-md-6 mb-4">
      <div class="card shadow h-100 py-2 bg-primary">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs fw-bold text-white text-uppercase mb-1">
                          Jumlah Mahasiswa</div>
                      <div class="h5 mb-0 font-weight-bold text-white"><?= $jumlah_mahasiswa ?></div>
                  </div>
                  <div class="col-auto">
                      <i class="bi bi-people-fill fs-1 text-dark opacity-50"></i>
                  </div>
              </div>
          </div>
        <div class="card-footer py-2">
            <a href="/admin/mahasiswa" class="text-white">Lihat Selengkapnya &rightarrowtail; </a>
        </div>
      </div>
  </div>

  <!-- Jumlah Mata Kuliah Card -->
  <div class="col-xl-4 col-md-6 mb-4">
      <div class="card shadow h-100 py-2 bg-success">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs fw-bold text-white text-uppercase mb-1">
                          Jumlah Mata Kuliah</div>
                      <div class="h5 mb-0 font-weight-bold text-white"><?= $jumlah_mata_kuliah ?></div>
                  </div>
                  <div class="col-auto">
                      <i class="bi bi-book-fill text-dark opacity-50 fs-1"></i>
                  </div>
              </div>
          </div>
        <div class="card-footer py-2">
            <a href="/admin/matakuliah/" class="text-white">Lihat Selengkapnya &rightarrowtail; </a>
        </div>
      </div>
  </div>


  <!-- Mahasiswa Belum Ambil MK Card -->
  <div class="col-xl-4 col-md-6 mb-4">
      <div class="card bg-warning shadow h-100">

          <div class="card-body">

              <div class="d-flex align-items-center">

                  <div class="mr-2">
                      <div class="text-xs fw-bold text-dark text-uppercase mb-1">
                          Mahasiswa Belum Mengambil Mata Kuliah</div>
                      <div class="h5 mb-0 font-weight-bold  text-dark"><?= $mahasiswa_tanpa_mk ?></div>
                  </div class="">
                      <i class="bibi bi-exclamation-circle-fill text-dark opacity-50 fs-1"></i>
                  </div>
        
              </div>
              
            <div class="card-footer py-2">
                <a href="/admin/matakuliah/" class="text-white">Lihat Selengkapnya &rightarrowtail; </a>
            </div>

          </div>
      </div>
  </div>

<?= $this->endSection()?>
