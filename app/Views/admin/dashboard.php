<?= $this->extend('layout/page_template') ?>

<?= $this->section('main-content') ?>
<h2 class=" my-3 mb-4 fw-bold">Dashboard</h2>
<h1 class="my-3 py-3">Selamat Datang <span class="text-success bg-">Admin</span>!</h1>
 <!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border border-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Jumlah Mahasiswa</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border border-success shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Jumlah Mata Kuliah</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">200</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border border-warning shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Mahasiswa Belum Mengambil Mata Kuliah</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<?= $this->endSection()?>