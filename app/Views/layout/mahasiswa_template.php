<?= $this->extend('layout/base_template') ?>
<?= $this->section('content') ?>

<!-- Header background + logo polban -->
<header class="hero-section">
  <div class="text-white d-flex align-items-center justify-content-center gap-4">
    <img src="<?=base_url('img/logo-polban.png')?>" class="img-fluid" style="max-width:75px;" alt="logo polban">
    <h2 class="fw-bold fs-1"><span class="text-polban-primary">SiAkad</span><span class="text-polban-secondary">Polban</span></h2>
  </div>
</header>

<!-- Navbar Mahasiswa -->
<nav class="navbar navbar-expand-lg bg-polban-primary" data-bs-theme="dark">
  <div class="container-fluid"> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mahasiswaNavbar" aria-controls="mahasiswaNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mahasiswaNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $title=='Dashboard Mahasiswa' ? 'active' : '' ?>" href="/mahasiswa/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $title=='Mata Kuliah' ? 'active' : '' ?>" href="/mahasiswa/matakuliah">Ambil Mata Kuliah</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?= $title=='Profil Mahasiswa' ? 'active' : '' ?>" href="/mahasiswa/profile">Profil Saya</a>
        </li>
      </ul>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
  Logout
</button>
    </div>
  </div>
</nav>

<main class="p-3 min-h-vh">
    <?= $this->renderSection('main-content')?>
    
    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin keluar dari sistem?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form action="/auth/logout" method="post">
              <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="batalMkModal" tabindex="-1" aria-labelledby="batalMkModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="batalMkModalLabel">Konfirmasi Pembatalan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin membatalkan mata kuliah yang dipilih?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger" id="konfirmasiBatalMk">Batalkan</button>
          </div>
        </div>
      </div>
    </div>
</main>

<footer class="bg-dark text-center p-3 text-light">
    &copy; Polban <?= date('Y') ?>
</footer>

<script src="<?= base_url('js/matakuliah.js')?>"></script>
<?= $this->endsection() ?>
